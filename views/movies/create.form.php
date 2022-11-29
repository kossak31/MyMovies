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
                <input type="text" name="name" class="form-control" required>
                <?php inputToken(); ?>
            </div>



            <div class="row">

                <div class="col">
                    <label for="">Selecionar Atores:</label>
                    <select class="form-select" name="actor[]" multiple required>
                        <?php foreach ($actors as $actor) : ?>
                            <option value="<?php echo $actor->id; ?>"><?php echo $actor->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="">Selecionar Géneros:</label>
                        <select class="form-select" name="genre[]" multiple required>
                            <?php foreach ($genres as $genre) : ?>
                                <option value="<?php echo $genre->id; ?>"><?php echo $genre->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

            </div>

            <div class="mb-3">
                <label for="">Selecionar Realizador:</label>
                <select class="form-select" name="director" required>
                    <?php foreach ($directors as $director) : ?>
                        <option value="<?php echo $director->id; ?>"><?php echo $director->name; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>


            <div class="row">
                <div class="col">
                    <label>País de Origem:</label>
                    <select class="form-select" name="country" required>
                        <option selected>Selecionar País</option>
                        <option value="Portugal">Portugal</option>
                        <option value="USA">USA</option>
                        
                    </select>
                    
                </div>

                <div class="col">
                    
                
                <label for="name" class="form-label">Ano de lançamento:</label>
                    <select class="form-select" name="year" required>
                        <option selected>Selecionar Ano</option>
                        <?php for ($i = 2022; $i >= 1900; $i--) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>                        
                    </select>
                    
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Trailer do Filme:</label>
                <input type="text" name="trailer" class="form-control" required>                
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Imagem de Capa:</label>
                <input class="form-control" name="file" type="file" accept="image/jpg">
            </div>


            <button type="submit" class="btn btn-primary">Inserir Filme</button>
        </form>

    </div>


</body>

</html>