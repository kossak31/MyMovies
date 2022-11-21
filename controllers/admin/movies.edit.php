<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Movie;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$genres = $queryBuilder->getAll('genre');
$actors = $queryBuilder->getAll('actor');
$directors = $queryBuilder->getAll('director');

$movie = $queryBuilder->findById('movie', $id, 'App\Model\Movie');

$genrex = $queryBuilder->findByMovieId('genre', $movie->id);

$actorx = $queryBuilder->findByActorId('actor', $movie->id);

foreach ($directors as $director) {
    $movie_director = $queryBuilder->findById('director', $movie->director_id);
}

$login = Session::get('login');
$username = Session::get('username');



if (!empty($_POST)) {
    
    $livro = new Movie();
    $queryBuilder->updateMovie($livro);
    redirect('admin/filmes');
}

require "views/admin/movies.edit.php";