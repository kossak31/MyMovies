<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;
use App\Recover;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (isset($_POST['reset_link'])) {

    $email = $_POST['email'];

    $query = $queryBuilder->selectUserByEmail('login', $email);

    if ($query) {

        $code = Recover::generateRandomString();

        $link = 'href="http://localhost/Movies/reset-password?email=' . $email . '&code=' . $code . '"';

        $link2 = 'Este link expira passado 10 minutos, clica no <a " ' . $link . ' "> Link </a>para definir nova password';

        $from_reset = $queryBuilder->selectUserByEmail('reset', $email);
        $now = date("Y-m-d H:i:s");
        $expire =  date('Y-m-d H:i:s', strtotime($now . ' +10 minutes'));


        if (empty($from_reset)) {
            $queryBuilder->insertReset($email, $code, $expire);
        } else {
            $queryBuilder->updateReset($email, $code, $expire);
        }

        Recover::sendemail($email, $link2);


        Session::setInfo('alert-warning', 'Mensagem enviada!');
    } else {
        Session::setInfo('alert-warning', 'Mensagem enviada!');
    }
}

require 'views/recover/check-email.php';
