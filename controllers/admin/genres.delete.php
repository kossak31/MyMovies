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
    Session::setInfo('alert-danger', "Apagou o registo");


    $genre = $queryBuilder->findById('genre', $id, 'App\Model\Genre');
    
    $arr = array(
        'id' => $genre->id,
        'type' => 'alert-danger',
        'msg' => 'foi eleminado um género chamado ' . "<b>" . $genre->name . "</b>",
    );


    
    $_SESSION['actions']['delete'][$genre->id] = $arr;


    $queryBuilder->deleteById('genre',$id);
    redirect('admin/generos');
}
