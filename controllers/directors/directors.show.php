<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$director = $queryBuilder->findById('director', $id, 'App\Model\Director');

$movies = $queryBuilder->findByDirectorId($id);

$login = Session::get('login');
$username = Session::get('username');



require "views/directors/directors.show.php";