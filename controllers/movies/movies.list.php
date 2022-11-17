<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$movies = $queryBuilder->getAll('movie', 'App\Model\Movie');

$login = Session::get('login');
$username = Session::get('username');

require 'views/movies/movie.list.php';
