<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


if ($_POST) {
    $password = $_POST['pass1'];
    $password2 = $_POST['pass2'];
    if ($password == $password2) {

        $queryBuilder->insertHashPassword($_POST['email'], password_hash($password, PASSWORD_DEFAULT));
        redirect('');
    }else {
        Session::setInfo('alert-warning', 'Password nao sao iguais');
        redirect('reset-password?email='.$_GET['email'].'&code='.$_POST['code']);
    }
}
