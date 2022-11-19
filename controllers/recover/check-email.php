<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


use App\Recover;

if (isset($_POST['reset_link'])) {

    $email = $_POST['email'];
    // Check if in the database
    $query = $queryBuilder->selectUserByEmail('login', $email);


    if ($query) {
        // existing user, proceed with reset password

        // generate a random code
        $code = Recover::generateRandomString();

        // Formulate the link
        $link = 'href="http://localhost/Movies/reset_password?email=' . $email . '&code=' . $code . '"';

        $link2 = '<span style="width:100%;"><a style="padding:10px 100px;border-radius:30px;background:#a8edbc;" ' . $link . ' > Link </a></span>';

        

        $from_reset = $queryBuilder->selectUserByEmail('reset', $email);
        $now = date("Y-m-d H:i:s");
        $expire =  date('Y-m-d H:i:s', strtotime($now. ' +10 minutes'));
        

        if (empty($from_reset)) {
            // Save code and INSERT email in a database
            $queryBuilder->insertReset($email, $code, $expire);
        } else {
            // Already exist reseting attempt, switch to UPDATE the reset table instead
            $queryBuilder->updateReset($email, $code, $expire);
        }



        // Send email with the link
        Recover::sendemail($email, $link2);

        // Notification
        $msg =  '<h4 class="text-success">Please check your email (including spam) to see the password reset link.</h4>';
    } else {
        $error =  "Email does not exist!";
    }
}

require 'views/recover/check-email.php';
