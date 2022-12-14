<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$favoritos = $queryBuilder->topFavoritos();

$login = Session::get('login');
$username = Session::get('username');




require 'views/top-favoritos.php';