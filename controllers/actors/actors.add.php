<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Actor;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($token !== $_SESSION['token']) {
    // return 405 http status code
    echo $_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed';
    exit;
} else {



    if (!empty($_POST)) {

        $actor = new Actor();
        $actor->name = strip_tags($_POST['name']);

        
        $queryBuilder->insert('actor', [
            'name' => $actor->name,
        ]);

        $last = $queryBuilder->getLast('actor', 'App\Model\Actor');

        $arr = array(
            'id' => $last->id,
            'type' => 'alert-primary',
            'msg' => 'foi inserido um actor ' . "<b>" . strip_tags($last->name) . "</b>",
        );



        Session::setInfo('alert-primary', 'foi inserido um ator chamado ' . "<b>" . strip_tags($_POST['name']) . "</b>");



        $_SESSION['actions']['add'][$last->id] = $arr;



        redirect('admin/atores');
    }
}
