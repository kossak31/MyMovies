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

        <a href="<?php echo route(''); ?>">
            <h1 class="text-end">Menu</h1>
        </a>


        <h1>Editar Livro</h1>


        <form action="<?php echo route('livros/' . $livro->id); ?>" method="POST">

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">nome do livro</label>
                <input type="text" name="nome" class="form-control" id="" value="<?php echo $livro->nome; ?>">
            </div>

            <label for="" class="form-label">Selecionar Editora</label>
            <select class="form-select" name="editora_id">
                <?php foreach ($editoras as $editora) : ?>
                    <option value="<?php echo $editora->id; ?>" <?php echo $livro->editora_id == $editora->id ? 'selected' : ''; ?>>
                        <?php echo $editora->nome; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">nome do livro</label>
                <input type="text" name="pags" class="form-control" id="" value="<?php echo $livro->pags; ?>">
            </div>

            <button class="btn btn-primary" type="submit">Editar livro</button>


        </form>

    </div>

</body>

</html>