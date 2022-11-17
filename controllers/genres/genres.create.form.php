<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$genres = $queryBuilder->getAll('genre', 'App\Model\Genre');

$actors = $queryBuilder->getAll('actor', 'App\Model\Actor');

$directors = $queryBuilder->getAll('director', 'App\Model\Director');


$login = Session::get('login');
$username = Session::get('username');

if (!$login) {
    redirect('');
} else {
    require 'views/genres/create.form.php';
}

