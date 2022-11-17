<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Movie;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (!empty($_POST)) {

    $movie = new Movie();
    $movie->name = $_POST['name'];
    $movie->genre = $_POST['genre'];
    $queryBuilder->insertMovie($movie);

    $last = $queryBuilder->getLast('movie', 'App\Model\Movie');

    $arr = array(
        'id' => $last->id,
        'type' => 'alert-primary',
        'msg' => 'foi inserido um filme ' . "<b>" . $last->name . "</b>",
    );



    Session::setInfo('alert-primary', 'foi inserido um filme chamado' . "<b>" . $_POST['name'] . "</b>");



    $_SESSION['actions']['add'][$last->id] = $arr;



    redirect('admin/filmes');
}
