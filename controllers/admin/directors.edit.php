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

    $olddirector = $queryBuilder->findById('director', $_POST['id'], 'App\Model\Director');


    $director = new Director();
    $director->name = $_POST['name'];
    $director->id = $_POST['id'];

    $queryBuilder->update('director', [
        'id' => $director->id,
        'name' => $director->name
    ]);


    Session::setInfo('alert-warning', 'foi editado um realizador');


    $arr = array(
        'id' => $director->id,
        'type' => 'alert-warning',
        'msg' => 'foi editado um género chamado ' . "<b>" . $olddirector->name . "</b> para <b>" . $director->name . "</b>",
    );



    $_SESSION['actions']['edit'][$director->id] = $arr;


    redirect('admin/realizadores');
}

require "views/admin/directors.edit.php";
