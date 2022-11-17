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

        <h1>Ver Livros</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">editora</th>
                    <th scope="col">nº paginas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro) : ?>
                    <tr>


                        <th scope="row"><?php echo $livro->id; ?></th>
                        <td> <a href="<?php echo route('livros/' . $livro->id); ?>">
                                <?php echo $livro->nome; ?> </a>
                        </td>

                        <td>editora: <?php echo $livro->editora->nome; ?></td>

                        <td><?php echo $livro->pags; ?></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-warning" href="<?php echo route('livros/' . $livro->id . '/edit'); ?>" role="button">Editar</a>
                                <form action="<?php echo route('livros/' . $livro->id); ?>" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?php echo $livro->id; ?>">
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                            </div>
                        </td>



                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>
</body>

</html>