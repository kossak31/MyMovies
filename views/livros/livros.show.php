<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>

<body>



<a href="<?php echo route('livros'); ?>">voltar</a>
<br>    

    nome do livro: <?php echo $livro->nome; ?><br>
    editora: <?php echo $livro->editora->nome; ?><br>
    pags: <?php echo $livro->pags; ?>





</body>

</html>