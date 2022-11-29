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
    $oldactor = $queryBuilder->findById('actor', $_POST['id'], 'App\Model\Actor');

    $actor = new Actor();
    $actor->name = $_POST['name'];
    $actor->id = $_POST['id'];
    $queryBuilder->updateActor($actor);

    $arr = array(
        'id' => $actor->id,
        'type' => 'alert-warning',
        'msg' => 'foi editado um género chamado ' . "<b>" . $oldactor->name . "</b> para <b>" . $actor->name . "</b>",
    );



    $_SESSION['actions']['edit'][$actor->id] = $arr;

    Session::setInfo('alert-warning', 'foi editado um ator');
    redirect('admin/atores');
}

require "views/admin/actors.edit.php";