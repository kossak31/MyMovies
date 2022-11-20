<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver filme <?php echo $movie->name; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php require 'views/navbar.php'; ?>

    <div class="container">
        <div class="col-12">
            <h1>Acerca do filme: <b><?php echo $movie->name; ?></b></h1>

        </div>
        <table class="table">
            <tr>
                <td>
                    <table align="left">
                        <tr>
                            <td>
                                <img src="../covers/<?php echo $movie->id; ?>.jpg" width="150" height="200" style="margin: 3px 5px 0 0; max-width:220px; height:auto; width:auto;" onerror="this.src='../img/dvd-cover.jpg'">

                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr valign="top">
                            <td>

                                <div><b>Realização:</b><br>
                                    <a href="<?php echo route('realizador/' . $director->id); ?>"><?php echo $director->name; ?></a>
                                </div>



                                <div style="margin-top: 6px;"><b>Elenco:</b><br>
                                    <?php foreach ($actors as $actor) : ?>
                                        <a href="<?php echo route('atores/' . $actor->actor_id); ?>"><?php echo $actor->name; ?></a><br>
                                    <?php endforeach ?>
                                </div>


                            </td>
                            <td width="10"></td>
                            <td>
                                <div><b>Ano:</b> <?php echo $movie->year; ?></div>

                                <div style="margin-top: 6px;"><b>Género:</b><br>
                                    <?php foreach ($genresMovie as $genre) : ?>
                                        <a href="<?php echo route('genero/' . $genre->genre_id); ?>"><?= $genre->name ?></a><br>
                                    <?php endforeach; ?>
                                </div>


                                <div style="margin-top: 6px;"><b>País:</b><br>
                                    <?php echo $movie->country; ?>
                                </div>




                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>


    </div>


</body>

</html>