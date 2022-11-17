<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;
$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$actor = $queryBuilder->findById('actor', $id, 'App\Model\Actor');

$movies = $queryBuilder->findByActorIdMovie('movie', $id, 'App\Model\Movie');




$login = Session::get('login');
$username = Session::get('username');


require "views/actors/actors.show.php";