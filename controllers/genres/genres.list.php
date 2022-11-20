<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$genres = $queryBuilder->getAll('genre', 'App\Model\Genre');



$login = Session::get('login');
$username = Session::get('username');

require 'views/genres/genres.list.php';
