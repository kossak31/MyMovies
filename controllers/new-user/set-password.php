<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

//check password
if (isset($_POST['password1']) && isset($_POST['password2'])) {
    if ($_POST['password1'] == $_POST['password2']) {
        $password = $_POST['password1'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $queryBuilder->savePassword($_POST['email'], $password);
        redirect('');
    } else {
        Session::setInfo('alert-danger', 'passwords nao sao iguais');
    }
}
