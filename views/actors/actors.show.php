<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $actor->name; ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body style="background-image: url('../img/background.jpg');">

    <?php require 'views/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <h1>filmes em que participa: <b><?php echo $actor->name; ?></b></h1>

            <?php if (isset($movies)) : ?>
              
                <?php foreach ($movies as $movie) : ?>
                    <div class="col-3">

                        <div class="card" style="width: 18rem;">
                            <img src="../covers/<?php echo $movie->movie_id; ?>.jpg" onerror="this.src='../img/dvd-cover.jpg'">
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                <a href="<?php echo route('filmes/' . $movie->movie_id); ?>" class="btn btn-primary"><?php echo $movie->name; ?></a>
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