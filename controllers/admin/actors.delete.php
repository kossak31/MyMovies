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

    $actor = $queryBuilder->findById('actor', $id, 'App\Model\Actor');
    
    $arr = array(
        'id' => $actor->id,
        'type' => 'alert-danger',
        'msg' => 'foi eleminado um ator chamado ' . "<b>" . $actor->name . "</b>",
    );


    
    $_SESSION['actions']['delete'][$actor->id] = $arr;



    $queryBuilder->deleteById('actor', $id);
    redirect('admin/atores');
}
