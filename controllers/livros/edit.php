<?php


use App\Database\Connection;
use App\Database\QueryBuilder;

use App\Model\Livro;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$editoras = $queryBuilder->getAll('editora', 'App\Model\Editora');

$livro = $queryBuilder->findById('livro', $id, 'App\Model\Livro');

$livro->editora = $queryBuilder->findById('editora', $livro->editora_id, 'App\Model\Editora');

require "views/livros/livros.edit.php";


if (!empty($_POST)) {
   
    $livro = new Livro($_POST);
    $queryBuilder->update($livro);
    redirect('livros');
 }
 
 
 