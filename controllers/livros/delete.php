<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

use App\Model\Livro;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


//$queryBuilder->delete($_POST['$id);

//$livro = new Livro($queryBuilder);
// $livro->delete($_POST['id']);

$queryBuilder->delete($_POST['id']);
redirect('livros');
