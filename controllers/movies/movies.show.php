<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$movie = $queryBuilder->findById('movie', $id, 'App\Model\Movie');
$director = $queryBuilder->findById('director', $movie->director_id, 'App\Model\Director');

$genresMovie = $queryBuilder->findByInnerJoin('genre', 'genremovie', $id, 'movie', 'App\Model\Genre');
$actors = $queryBuilder->findByInnerJoin('actor', 'actormovie', $id, 'movie', 'App\Model\Actor');



$login = Session::get('login');
$username = Session::get('username');

require "views/movies/movies.show.php";