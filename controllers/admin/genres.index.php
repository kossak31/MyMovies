<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$genres = $queryBuilder->getAll('genre', 'App\Model\Genre');


$login = Session::get('login');
$username = Session::get('username');


if (!$login && $username == 'admin') {
    redirect('');
} else {
    require 'views/admin/genres.index.php';
}
