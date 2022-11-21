<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Director;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

if (!empty($_POST)) {

    $director = new Director();
    $director->name = $_POST['name'];
    
    $queryBuilder->insertDirector($director);

    $last = $queryBuilder->getLast('director', 'App\Model\Director');

    $arr = array(
        'id' => $last->id,
        'type' => 'alert-primary',
        'msg' => 'foi inserido um filme ' . "<b>" . $last->name . "</b>",
    );



    Session::setInfo('alert-primary', 'foi inserido um realizador chamado ' . "<b>" . $_POST['name'] . "</b>");



    $_SESSION['actions']['add'][$last->id] = $arr;



    redirect('admin/realizadores');
}
