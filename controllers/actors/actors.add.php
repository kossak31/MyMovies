<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Actor;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (!empty($_POST)) {

    $actor = new Actor();
    $actor->name = $_POST['name'];
    
    $queryBuilder->insertActor($actor);

    $last = $queryBuilder->getLast('actor', 'App\Model\Actor');

    $arr = array(
        'id' => $last->id,
        'type' => 'alert-primary',
        'msg' => 'foi inserido um actor ' . "<b>" . $last->name . "</b>",
    );



    Session::setInfo('alert-primary', 'foi inserido um ator chamado' . "<b>" . $_POST['name'] . "</b>");



    $_SESSION['actions']['add'][$last->id] = $arr;



    redirect('admin/atores');
}
