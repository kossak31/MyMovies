<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Director;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$director = $queryBuilder->findById('director', $id, 'App\Model\Director');

$login = Session::get('login');
$username = Session::get('username');



if ($_POST) {

    $director = new Director();
    $director->name = $_POST['name'];
    $director->id = $_POST['id'];
    $queryBuilder->updateDirector($director);
    Session::setInfo('alert-warning', 'foi editado um realizado');

    redirect('admin/realizadores');
}

require "views/admin/directors.edit.php";
