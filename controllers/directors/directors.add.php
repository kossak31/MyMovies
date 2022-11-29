<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Director;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($token !== $_SESSION['token']) {
    // return 405 http status code
    echo $_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed';
    exit;
} else {


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
}
