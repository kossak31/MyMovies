<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyMovies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body style="background-image: url('img/background.jpg');">

    <?php require('views/navbar.php'); ?>
    
    <?php if (!isset($favoritos)) : ?>
    <div class="d-flex flex-row justify-content-center align-items-center" style="height: 450px;">
        <div>
            <h1 class="text-capitalize">top Filmes favoritos</h1>
                <?php foreach ($favoritos as $favorito) : ?>
                    <?php echo $favorito->name; ?> - <?php echo $favorito->total; ?> Votos<br>
                <?php endforeach ?>
                <?php else: ?>
                    <div class="d-flex flex-row justify-content-center align-items-center" style="height: 450px;">
                    <h1>não existem favoritos</h1>
                </div>
            <?php endif ?>
        </div>
    </div>

</body>
</html>