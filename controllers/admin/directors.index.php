<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$directors = $queryBuilder->getAll('director', 'App\Model\Director');


$login = Session::get('login');
$username = Session::get('username');


if (!$login && $username == 'admin') {
    redirect('');
} else {
    require 'views/admin/directors.index.php';
}
