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
    <div class="container">
        <a href="<?php echo route(''); ?>"><h1 class="text-end">Voltar</h1></a>
        <h1>Inserir novo livro</h1>

        <form action="<?php echo route('livros'); ?>" method="POST">


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">nome do livro:</label>
                <input type="text" name="nome" class="form-control" id="" placeholder="">
            </div>

            <label for="">nome da editora:</label>
            <select class="form-select" name="editora_id">
                <?php
                foreach ($editoras as $editora) {
                    echo "<option value='$editora->id'>" . $editora->nome . "</option>";
                } ?>
            </select>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">nº paginas:</label>
                <input type="text" name="pags" class="form-control" id="" placeholder="">
            </div>

            <button class="btn btn-primary" type="submit">Inserir Livro</button>
        </form>
    </div>
</body>

</html>