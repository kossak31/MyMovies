<?php
use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$director = $queryBuilder->findByAnotherId('director', $id, null, 'App\Model\Director');

$movies = $queryBuilder->findByAnotherId('movie', $id, 'director_id', 'App\Model\Movie');

$login = Session::get('login');
$username = Session::get('username');

require "views/directors/directors.show.php";