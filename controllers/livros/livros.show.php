<?php


use App\Database\Connection;
use App\Database\QueryBuilder;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);

$editoras = $queryBuilder->getAll('editora', 'App\Model\Editora');

$livro = $queryBuilder->findById('livro', $id, 'App\Model\Livro');

$livro->editora = $queryBuilder->findById('editora', $livro->editora_id, 'App\Model\Editora');

require "views/livros/livros.show.php";