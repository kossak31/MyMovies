<?php


use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$genre = $queryBuilder->findById('genre', $id, 'App\Model\Genre');

$movies = $queryBuilder->findByGenreId('movie',$genre->id, 'App\Model\Movie');




require "views/genres/genres.show.php";