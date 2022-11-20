<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizador: <?php echo $director->name; ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php require 'views/navbar.php'; ?>

    <div class="container">
        <div class="row">



            <h2>filmes realizados por <?php echo $director->name; ?></h2>
            <?php foreach ($movies as $movie) : ?>
                <ul>
                    <li><a href="<?php echo route ('filmes/'.$movie->id); ?>"><?php echo $movie->name; ?></a></li>
                </ul>
            <?php endforeach ?>



        </div>
    </div>



</body>

</html>