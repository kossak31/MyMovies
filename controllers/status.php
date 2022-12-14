<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$login = Session::get('login');
$username = Session::get('username');


require 'views/status.php';
