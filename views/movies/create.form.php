<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserir filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php require 'views/navbar.php'; ?>

    <div class="container">

        <form action="<?php echo route('filmes') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nome do Filme:</label>
                <input type="text" name="name" class="form-control">
            </div>



            <div class="row">

                <div class="col">
                    <label for="">Selecionar Atores:</label>
                    <select class="form-select" name="actor[]" multiple>
                        <?php foreach ($actors as $actor) : ?>
                            <option value="<?php echo $actor->id; ?>"><?php echo $actor->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="">Selecionar Géneros:</label>
                        <select class="form-select" name="genre[]" multiple>
                            <?php foreach ($genres as $genre) : ?>
                                <option value="<?php echo $genre->id; ?>"><?php echo $genre->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

            </div>

            <div class="mb-3">
                <label for="">Selecionar Realizador:</label>
                <select class="form-select" name="director[]">
                    <?php foreach ($directors as $director) : ?>
                        <option value="<?php echo $director->id; ?>"><?php echo $director->name; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>


            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">País de Origem:</label>
                    <input type="text" name="country" class="form-control">
                </div>

                <div class="col">
                    <label for="name" class="form-label">Ano de lançamento:</label>
                    <input type="text" name="year" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Imagem de Capa:</label>
                <input class="form-control" name="file" type="file">
            </div>


            <button type="submit" class="btn btn-primary">Inserir Filme</button>
        </form>

    </div>
</body>

</html>