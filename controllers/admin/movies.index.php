<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$movies = $queryBuilder->getAll('movie', 'App\Model\Movie');

//mostrar generos do filme no CRUD
foreach ($movies as $movie) {
    $movie->genres = $queryBuilder->findByInnerJoin('genre', 'genremovie', $movie->id, 'movie', 'App\Model\Genre');
}

$login = Session::get('login');
$username = Session::get('username');

if (!$login && $username == 'admin') {
    redirect('');
} else {
    require 'views/admin/movies.index.php';
}