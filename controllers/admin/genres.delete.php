<?php

use App\Database\Connection;
use App\Database\QueryBuilder;


$connection = Connection::make();
$queryBuilder = new QueryBuilder($connection);





if (!$login && $username == 'admin') {
    redirect('');
} else {
    $queryBuilder->deleteById('movie',$id);
    redirect('admin/filmes');
}
