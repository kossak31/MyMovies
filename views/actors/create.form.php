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

        <form action="<?php echo route('atores') ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nome do Ator:</label>
                <input type="text" name="name" class="form-control" required>
            </div>




            <button type="submit" class="btn btn-primary">Inserir Ator</button>
        </form>

    </div>
</body>

</html>