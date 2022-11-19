<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;
use App\Recover;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$page = $queryBuilder->checkCode($_GET['email'], $_GET['code']);

$expdate = $queryBuilder->selectUserByEmail('reset', $_GET['email']);



if ($page && $expdate[0]->expdate > date("Y-m-d H:i:s") ) {
    require 'views/recover/recover.php';
} else {
    echo "Invalid link";
}
