<?php

use App\Database\Connection;
use App\Database\QueryBuilder;
use App\Session;

use App\Model\Genre;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($token !== $_SESSION['token']) {
    // return 405 http status code
    echo $_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed';
    exit;
} else {

    if (!empty($_POST)) {

        $genre = new Genre();
        $genre->name = strip_tags($_POST['name']);

        $queryBuilder->insert('genre', [
            'name' => $genre->name,
        ]);

        $last = $queryBuilder->getLast('genre', 'App\Model\Genre');

        $arr = array(
            'id' => $last->id,
            'type' => 'alert-primary',
            'msg' => 'foi inserido um género ' . "<b>" . strip_tags($last->name) . "</b>",
        );

        $_SESSION['actions']['add'][$last->id] = $arr;


        Session::setInfo('alert-primary', 'foi inserido um género chamado ' . "<b>" . strip_tags($_POST['name']) . "</b>");

        redirect('admin/generos');
    }
}
