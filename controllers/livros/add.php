<?php

use App\Database\Connection;
use App\Database\QueryBuilder;

use App\Model\Livro;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);


$editoras = $queryBuilder->getAll('editora', 'App\Model\Editora');




if (!empty($_POST)) {
   
   $livro = new Livro($_POST);
//    $livro->nome = $_POST['nome'];
//    $livro->editora_id = $_POST['editora_id'];
//    $livro->pags = $_POST['pags'];
   $queryBuilder->insert($livro);
   redirect('livros');
}


