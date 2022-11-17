<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$search = $_GET['search'];

$searchByName = $queryBuilder->searchByName('movie', $search);




require 'views/menu.php';
