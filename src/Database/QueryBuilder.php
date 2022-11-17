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




    public function insertMovie($movie)
    {
        $stmt = $this->pdo->prepare("INSERT INTO movie (name, year, country, director_id) VALUES (:name, :year, :country, :director_id)");
        $stmt->execute([
            'name' => $movie->name,
            'year' => $movie->year,
            'country' => $movie->country,
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


    public function deleteByMovieId($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM movie WHERE id=:id");
        $stmt->execute(['id' => $id]);
    }




    public function searchByName($table, $name, $class = "StdClass")
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE name LIKE :name");
        $stmt->execute(['name' => '%' . $name . '%']);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }







    public function insert($livro)
    {
        $stmt = $this->pdo->prepare("INSERT INTO livro (nome, editora_id, pags) VALUES (:nome, :editora_id, :pags)");
        $stmt->execute([
            'nome' => $livro->nome,
            'editora_id' => $livro->editora_id,
            'pags' => $livro->pags
        ]);
    }


    public function update($livro)
    {
        $stmt = $this->pdo->prepare("UPDATE livro SET nome=:nome, editora_id=:editora_id, pags=:pags WHERE id=:id");
        $stmt->execute([
            'id' => $livro->id,
            'nome' => $livro->nome,
            'editora_id' => $livro->editora_id,
            'pags' => $livro->pags
        ]);
    }



    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM livro WHERE id=:id");
        $stmt->execute(['id' => $id]);
    }
}
