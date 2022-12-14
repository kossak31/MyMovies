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
    $oldgenre = $queryBuilder->findById('genre', $_POST['id'], 'App\Model\Genre');

    $genre = new Genre();
    $genre->name = $_POST['name'];
    $genre->id = $_POST['id'];

    $queryBuilder->update('genre', [
        'id' => $genre->id,
        'name' => $genre->name
    ]);

    $arr = array(
        'id' => $genre->id,
        'type' => 'alert-warning',
        'msg' => 'foi editado um género chamado ' . "<b>" . $oldgenre->name . "</b> para <b>" . $genre->name . "</b>",
    );



    $_SESSION['actions']['edit'][$genre->id] = $arr;

    Session::setInfo('alert-warning', 'foi editado um género');

    // redirect('admin/generos');
}

require "views/admin/genres.edit.php";
