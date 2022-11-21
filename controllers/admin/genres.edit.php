<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Genre;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$genre = $queryBuilder->findById('genre', $id, 'App\Model\Genre');

$login = Session::get('login');
$username = Session::get('username');



if ($_POST) {
    
    $genre = new Genre();
    $genre->name = $_POST['name'];
    $genre->id = $_POST['id'];
    $queryBuilder->updateGenre($genre);
    redirect('admin/generos');
}

require "views/admin/genres.edit.php";