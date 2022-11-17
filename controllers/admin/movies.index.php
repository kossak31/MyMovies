<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$movies = $queryBuilder->getAll('movie', 'App\Model\Movie');

foreach ($movies as $movie) {
    $movie->genres = $queryBuilder->findByMovieId('genre', $movie->id, 'App\Model\Genre');
}

$login = Session::get('login');
$username = Session::get('username');

if (!$login) {
    redirect('');
} else {
    require 'views/admin/movies.index.php';
}
