<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$actors = $queryBuilder->getAll('actor', 'App\Model\Movie');



$login = Session::get('login');
$username = Session::get('username');

require 'views/actors/actors.list.php';
