<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$directors = $queryBuilder->getAll('director', 'App\Model\Director');



$login = Session::get('login');
$username = Session::get('username');

require 'views/directors/directors.list.php';
