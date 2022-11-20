<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$genre = $queryBuilder->findById('genre', $id, 'App\Model\Genre');

$movies = $queryBuilder->findByGenreId('movie',$genre->id, 'App\Model\Movie');


$login = Session::get('login');
$username = Session::get('username');


require "views/genres/genres.show.php";