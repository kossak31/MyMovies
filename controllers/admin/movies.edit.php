<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Movie;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$genres = $queryBuilder->getAll('genre', 'App\Model\Genre');

$movie = $queryBuilder->findById('movie', $id, 'App\Model\Movie');

$genre = $queryBuilder->findByMovieId('genre', $movie->id, 'App\Model\Genre');

$login = Session::get('login');
$username = Session::get('username');

require "views/admin/movies.edit.php";


if (!empty($_POST)) {

    $livro = new Movie();
    $queryBuilder->update($livro);
    redirect('admin/filmes');
}
