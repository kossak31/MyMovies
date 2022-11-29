<?php

namespace App\Database;


use Connection;
use \PDO;


class QueryBuilder
{

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // SELECT
    public function getAll($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    // encontrar por id
    public function findById($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE  id=:id");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    //delete por id
    public function deleteById($table, $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id=:id");
        $stmt->execute(['id' => $id]);
    }


    public function insertMovie($movie)
    {
        $stmt = $this->pdo->prepare("INSERT INTO movie (name, year, country, trailer, director_id) VALUES (:name, :year, :country, :trailer, :director_id)");
        $stmt->execute([
            'name' => $movie->name,
            'year' => $movie->year,
            'country' => $movie->country,
            'trailer' => $movie->trailer,
            'director_id' => $movie->director_id
        ]);
        $id = $this->pdo->lastInsertId();

        foreach ($movie->genre as $genre) {
            $stmt = $this->pdo->prepare("INSERT INTO genremovie (movie_id, genre_id) VALUES (:movie_id, :genre_id)");
            $stmt->execute(['movie_id' => $id, 'genre_id' => $genre]);
        }

        foreach ($movie->actor as $actor) {
            $stmt = $this->pdo->prepare("INSERT INTO actormovie (movie_id, actor_id) VALUES (:movie_id, :actor_id)");
            $stmt->execute(['movie_id' => $id, 'actor_id' => $actor]);
        }



        if (empty($_FILES['file']['name'])) {

            $target_dir = "covers/";
            $imageFileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $source_file = $target_dir . $id . "." . $imageFileType;



            if ($_FILES["file"]["size"] > 500000) {
                echo "tamanho do ficheiro muito grande!";
            }


            if (move_uploaded_file($_FILES["file"]["tmp_name"], $source_file && $imageFileType != "jpg")) {
                echo htmlspecialchars(basename($_FILES["file"]["name"])) . " foi enviado com sucesso.";
            } else {
                echo "erro no upload do ficheiro de imagem";
            }
        }
    }
    //update movie
    public function updateMovie($movie)
    {
        $stmt = $this->pdo->prepare("UPDATE movie SET name=:name, year=:year, country=:country, trailer=:trailer, director_id=:director_id WHERE id=:id");
        $stmt->execute([
            'id' => $movie->id,
            'name' => $movie->name,
            'year' => $movie->year,
            'country' => $movie->country,
            'trailer' => $movie->trailer,
            'director_id' => $movie->director_id
        ]);

        $stmt = $this->pdo->prepare("DELETE FROM genremovie WHERE movie_id=:movie_id");
        $stmt->execute(['movie_id' => $movie->id]);

        foreach ($movie->genre as $genre) {
            $stmt = $this->pdo->prepare("INSERT INTO genremovie (movie_id, genre_id) VALUES (:movie_id, :genre_id)");
            $stmt->execute(['movie_id' => $movie->id, 'genre_id' => $genre]);
        }

        $stmt = $this->pdo->prepare("DELETE FROM actormovie WHERE movie_id=:movie_id");
        $stmt->execute(['movie_id' => $movie->id]);

        foreach ($movie->actor as $actor) {
            $stmt = $this->pdo->prepare("INSERT INTO actormovie (movie_id, actor_id) VALUES (:movie_id, :actor_id)");
            $stmt->execute(['movie_id' => $movie->id, 'actor_id' => $actor]);
        }
    }
    //inserir ator
    public function insertActor($actor)
    {
        $stmt = $this->pdo->prepare("INSERT INTO actor (name) VALUES (:name)");
        $stmt->execute([
            'name' => $actor->name,
        ]);
    }

    public function insertDirector($director)
    {
        $stmt = $this->pdo->prepare("INSERT INTO director (name) VALUES (:name)");
        $stmt->execute([
            'name' => $director->name,
        ]);
    }

    public function insertGenre($genre)
    {
        $stmt = $this->pdo->prepare("INSERT INTO genre (name) VALUES (:name)");
        $stmt->execute([
            'name' => $genre->name,
        ]);
    }

    //update actor
    public function updateActor($actor)
    {
        $stmt = $this->pdo->prepare("UPDATE actor SET name=:name WHERE id=:id");
        $stmt->execute([
            'name' => $actor->name,
            'id' => $actor->id
        ]);
    }

    public function updateDirector($director)
    {
        $stmt = $this->pdo->prepare("UPDATE director SET name=:name WHERE id=:id");
        $stmt->execute([
            'name' => $director->name,
            'id' => $director->id
        ]);
    }



    public function updateGenre($genre)
    {
        $stmt = $this->pdo->prepare("UPDATE genre SET name=:name WHERE id=:id");
        $stmt->execute([
            'name' => $genre->name,
            'id' => $genre->id
        ]);
    }



    // selecionar ultimo registo
    public function getLast($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table ORDER BY id DESC LIMIT 1");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute();
        return $stmt->fetch();
    }

    // selecionar aleatorio
    public function getRandom($table, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table ORDER BY RAND() LIMIT 1");
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function returnHashPassword($username)
    {
        $stmt = $this->pdo->prepare("SELECT password FROM login WHERE username=:username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetchColumn();
    }



    // encontrar generos por filme id
    public function findByMovieId($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table INNER JOIN genremovie ON genremovie.genre_id  = $table.id WHERE  movie_id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }



    // encontrar genero id
    public function findByGenreId($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table INNER JOIN genremovie ON genremovie.movie_id  = $table.id WHERE  genre_id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }


    // encontrar actores por filme id
    public function findByActorId($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table INNER JOIN actormovie ON actormovie.actor_id  = $table.id WHERE  movie_id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    // encontrar filmes por actores id
    public function findByActorIdMovie($table, $id, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table INNER JOIN actormovie ON actormovie.movie_id  = $table.id WHERE  actor_id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }


    //encontrar filmes por diretor id
    public function findByDirectorId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM movie WHERE  director_id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }



    public function searchByName($table, $name)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }




    //password recover
    public function selectUserByEmail($table, $email, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE email=:email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    //inserir email e token expdate
    public function insertReset($email, $code, $expire)
    {
        $stmt = $this->pdo->prepare("INSERT INTO reset(email, code, expdate) VALUES (:email, :code, :expire)");
        $stmt->execute(['email' => $email, 'code' => $code, 'expire' => $expire]);
    }

    //actualiar codigo e expdate
    public function updateReset($email, $code, $expire)
    {
        $stmt = $this->pdo->prepare("UPDATE reset SET code = :code, expdate = :expire WHERE email = :email");
        $stmt->execute(['email' => $email, 'code' => $code, 'expire' => $expire]);
    }

    //verificar se email e token existem
    public function checkCode($email, $code)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM reset WHERE email = :email AND code = :code");
        $stmt->execute(['email' => $email, 'code' => $code]);
        return $stmt->fetch();
    }

    public function insertHashPassword($email, $password)
    {
        $stmt = $this->pdo->prepare("UPDATE login SET password=:password WHERE email=:email");
        $stmt->execute(['password' => $password, 'email' => $email]);
    }

    //registar novo utilizador
    public function registerUsernameAndEmail($username, $email)
    {
        $stmt = $this->pdo->prepare("INSERT INTO login(username, email) VALUES (:username, :email)");
        $stmt->execute(['username' => $username, 'email' => $email]);
    }
    //verfica se existe email
    public function checkEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM login WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    //verfica se existe email
    public function checkUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM login WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }

    //update password e email
    public function savePassword($email, $password)
    {
        $stmt = $this->pdo->prepare("UPDATE login SET password=:password WHERE email=:email");
        $stmt->execute(['password' => $password, 'email' => $email]);
    }

    //salvar favoritos
    public function saveFavorite($user_id, $movie_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO favorite(user_id, movie_id) VALUES (:user_id, :movie_id)");
        $stmt->execute(['user_id' => $user_id, 'movie_id' => $movie_id]);
    }

    //user id
    public function getUserId($username)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM login WHERE username=:username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }


    public function getMoviesNameByUserId($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM favorite INNER JOIN movie ON favorite.movie_id = movie.id WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }


    public function checkFavorite($user_id, $movie_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM favorite WHERE user_id = :user_id AND movie_id = :movie_id");
        $stmt->execute(['user_id' => $user_id, 'movie_id' => $movie_id]);
        return $stmt->fetch();
    }

    public function deleteFavorite($user_id, $movie_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM favorite WHERE user_id = :user_id AND movie_id = :movie_id");
        $stmt->execute(['user_id' => $user_id, 'movie_id' => $movie_id]);
    }
}
