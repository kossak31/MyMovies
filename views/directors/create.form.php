<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserir filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body style="background-image: url('img/background.jpg');">

    <?php require 'views/navbar.php'; ?>

    <div class="container">

        <form action="<?php echo route('realizadores') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nome do Realizador:</label>
                <input type="text" name="name" class="form-control" required>
                <?php inputToken(); ?>
            </div>

            <button type="submit" class="btn btn-primary">Inserir Realizador</button>
        </form>

    </div>
</body>

</html>