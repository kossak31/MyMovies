<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$movies = $queryBuilder->getAll('movie', 'App\Model\Movie');

$genres = $queryBuilder->getAll('genre', 'App\Model\Genre');

$lastMovie = $queryBuilder->getLast('movie', 'App\Model\Movie');

$randomMovie = $queryBuilder->getRandom('movie', 'App\Model\Movie');





$login = Session::get('login');
$username = Session::get('username');




require 'views/menu.php';