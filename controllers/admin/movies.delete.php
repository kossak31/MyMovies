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
    $queryBuilder->deleteById('movie', $id);
    
    Session::setInfo('alert-danger', "Apagou o filme");
    unlink('covers/' . $id . '.jpg');

    redirect('admin/filmes');
}
