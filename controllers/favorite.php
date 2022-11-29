<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$favorite = $_POST['favorito'];
$username = $_POST['user'];

$user_id = $queryBuilder->getUserId($username);

$movie_name = $queryBuilder->findById('movie', $favorite, 'App\Model\Movie');

if ($queryBuilder->checkFavorite($user_id['id'], $favorite)) {
    $queryBuilder->deleteFavorite($user_id['id'], $favorite);
    
} else {
    $queryBuilder->saveFavorite($user_id['id'], $favorite);
    echo "<li id='favorito" . $favorite . "'><a class='dropdown-item list_fav' href='filmes/" . $favorite . "'>" . $movie_name->name . "</a></li>";
}
