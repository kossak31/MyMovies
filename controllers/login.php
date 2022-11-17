<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$user = $_POST['username'];
$passwordPOST = $_POST['password'];

$password = password_hash($passwordPOST, PASSWORD_DEFAULT);
$passwordFromDB = $queryBuilder->returnHashPassword($user);


if (password_verify($passwordPOST, $passwordFromDB)) {

    
    Session::set('login', true);
    Session::set('username', $user);

 
    redirect('');

} else {
    
    Session::set('login', false);
    echo 'password errada.';
}

