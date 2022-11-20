<?php


use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Actor;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$actor = $queryBuilder->findById('actor', $id, 'App\Model\Actor');

$login = Session::get('login');
$username = Session::get('username');



if ($_POST) {
    
    $actor = new Actor();
    $actor->name = $_POST['name'];
    $actor->id = $_POST['id'];
    $queryBuilder->updateActor($actor);
    redirect('admin/atores');
}

require "views/admin/actors.edit.php";