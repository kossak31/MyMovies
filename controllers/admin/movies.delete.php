<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$login = Session::get('login');
$username = Session::get('username');

if (!$login && $username == 'admin') {
    redirect('');
} else {
    
    Session::setInfo('alert-danger', "Apagou o filme");
    
    $movie = $queryBuilder->findById('movie', $id, 'App\Model\Movie');
    
    $arr = array(
        'id' => $movie->id,
        'type' => 'alert-danger',
        'msg' => 'foi eleminado um filme chamado ' . "<b>" . $movie->name . "</b>",
    );


    
    $_SESSION['actions']['delete'][$movie->id] = $arr;
    $queryBuilder->deleteById('movie', $id);



    unlink('covers/' . $id . '.jpg');

    redirect('admin/filmes');
}
