<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);



$movie = $queryBuilder->findById('movie', $id, 'App\Model\Movie');

$genresMovie = $queryBuilder->findByMovieId('genre', $id, 'App\Model\Genre');

$director = $queryBuilder->findById('director', $movie->director_id, 'App\Model\Director');

$actors = $queryBuilder->findByActorId('actor', $id, 'App\Model\Actor');


$login = Session::get('login');
$username = Session::get('username');

require "views/movies/movies.show.php";
