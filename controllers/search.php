<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$search = $_GET['search'];

$searchByName = $queryBuilder->searchByName('movie', $search);



foreach ($searchByName as $movie) {
    

    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<img src="covers/' . $movie->id . '.jpg" class="img-fluid" width=100 height=140  onerror="this.src=\'img/dvd-cover.jpg\'">';
    echo '<a href="filmes/' . $movie->id . '">' . $movie->name . " - " . $movie->year . '</a>';
    echo '</div>';
    echo '</div>';
}
