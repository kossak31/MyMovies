<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Movie;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($token !== $_SESSION['token']) {
    // return 405 http status code
    echo $_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed';
    exit;
} else {


    if (!empty($_POST)) {

        $movie = new Movie();
        $movie->name = strip_tags($_POST['name']);
        $movie->genre = $_POST['genre'];
        $movie->actor = $_POST['actor'];
        $movie->year = strip_tags($_POST['year']);
        $movie->country = strip_tags($_POST['country']);
        $movie->director_id = strip_tags($_POST['director_id']);

        $queryBuilder->insert('movie', [
            'name' => $movie->name,
            'year' => $movie->year,
            'country' => $movie->country,
            'director_id' => $movie->director_id
        ]);

        foreach ($movie->genre as $genre) {
            $queryBuilder->insert('genremovie', [
                'genre_id' => $genre,
                'movie_id' => $queryBuilder->getLast('movie', 'App\Model\Movie')->id
            ]);
        }

        foreach ($movie->actor as $actor) {
            $queryBuilder->insert('actormovie', [
                'actor_id' => $actor,
                'movie_id' => $queryBuilder->getLast('movie', 'App\Model\Movie')->id
            ]);
        }

        if (!empty($_FILES['file']['name'])) {

            $target_dir = "covers/";
            $imageFileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $source_file = $target_dir . $queryBuilder->getLast('movie', 'App\Model\Movie')->id . "." . $imageFileType;

            if ($_FILES["file"]["size"] > 500000) {
                echo "tamanho do ficheiro muito grande!";
            }


            if (move_uploaded_file($_FILES["file"]["tmp_name"], $source_file)) {
                echo htmlspecialchars(basename($_FILES["file"]["name"])) . " foi enviado com sucesso.";
            } else {
                echo "erro no upload do ficheiro de imagem";
            }
        }

        $last = $queryBuilder->getLast('movie', 'App\Model\Movie');

        $arr = array(
            'id' => $last->id,
            'type' => 'alert-primary',
            'msg' => 'foi inserido um filme ' . "<b>" . strip_tags($last->name) . "</b>",
        );

        Session::setInfo('alert-primary', 'foi inserido um filme chamado ' . "<b>" . strip_tags($_POST['name']) . "</b>");

        $_SESSION['actions']['add'][$last->id] = $arr;

        redirect('admin/filmes');
    }
}
