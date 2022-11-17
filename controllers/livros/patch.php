<?php


use App\Database\Connection;
use App\Database\QueryBuilder;

use App\Model\Livro;

$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);



