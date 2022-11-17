<?php

use App\Database\Connection;
use App\Database\QueryBuilder;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);



$queryBuilder->deleteByMovieId($_POST['id']);
redirect('admin/filmes');
