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


    $director = $queryBuilder->findById('director', $id, 'App\Model\Director');
    
    $arr = array(
        'id' => $director->id,
        'type' => 'alert-danger',
        'msg' => 'foi eleminado um director chamado ' . "<b>" . $director->name . "</b>",
    );


    
    $_SESSION['actions']['delete'][$director->id] = $arr;


    $queryBuilder->deleteById('director', $id);
    redirect('admin/realizadores');
}
