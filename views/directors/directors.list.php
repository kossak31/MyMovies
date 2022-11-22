<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php require 'views/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <h1>Listar Realizadores</h1>

            <?php if (isset($directors)) : ?>

                <?php foreach ($directors as $director) : ?>
                    <div class="col-3">

                        <div class="card my-3" >
                            
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $director->name; ?></h5>
                                <div class="d-grid gap-2">
                                    <a href="<?php echo route('realizadores/' . $director->id); ?>" class="btn btn-primary">Listar Filmes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>



            <?php endif ?>
        </div>
    </div>

</body>

</html>