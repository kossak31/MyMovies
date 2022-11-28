<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;
use App\Recover;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$username = $_POST['username'];
$email = $_POST['email'];

$token = Recover::generateRandomString();



$checkusername = $queryBuilder->checkUsername($username);
$checkemail = $queryBuilder->checkEmail($email);

if ($checkusername || $checkemail) {

    Session::setInfo('alert-danger', 'utilizador ou email ja existem');
    redirect('');
} else {
    $queryBuilder->registerUsernameAndEmail($username, $email);

    $link = 'href="http://localhost/Movies/autologin?email=' . $email . '&token=' . $token . '"';

    $link2 = 'Entrar automaticamente no site <a " ' . $link . ' "> Link </a>';

    Recover::sendemail($email, $link2);
    Session::setInfo('alert-warning', 'veja o seu email para definir password');

    redirect('');
}
