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
    $queryBuilder->deleteById('genre',$id);
    Session::setInfo('alert-danger', "Apagou o registo");
    redirect('admin/generos');
}
