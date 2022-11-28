<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<style>
    /* Parent Container */
    .content_img {
        position: relative;
        width: auto;
        height: auto;
        float: left;
        margin-right: 0%;
    }

    /* Child Text Container */
    .content_img div {
        position: absolute;
        top: 0px;
        right: 0;
        background: black;
        color: white;
        margin-bottom: 5px;
        font-family: sans-serif;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: visibility 0s, opacity 0.5s linear;
        transition: visibility 0s, opacity 0.5s linear;
    }

    /* Hover on Parent Container */
    .content_img:hover {
        cursor: pointer;
    }

    .content_img:hover div {
        width: 250px;
        padding: 8px 15px;
        visibility: visible;
        opacity: 0.7;
    }

    .fade-in-image {

        opacity: 50%;
        -webkit-transition: opacity 0.5s linear;
        transition: opacity 0.5s linear;

    }
</style>

<body>

    <?php require 'views/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <h1>Listar Filmes</h1>

            <?php foreach ($movies as $movie) : ?>
                <?php $moviesarray[] = $movie->name; ?>
            <?php endforeach ?>
            <?php foreach ($favoriteMovies as $favoriteMovie) : ?>
                <?php $favarray[] = $favoriteMovie->name; ?>
            <?php endforeach ?>








            <?php if ($login == true &&  !empty($favoriteMovie)) : ?>

                <!-- vista com filmes favoritos -->
                <?php foreach ($movies as $key => $movie) : ?>
                    <div class="col-3 d-flex justify-content-center">

                        <div class="card my-2">

                            <div id="<?php echo $movie->id; ?>" class="favoritos content_img <?php echo in_array($moviesarray[$key], $favarray) ? 'fade-in-image' : ''; ?>">
                                <img src="covers/<?php echo $movie->id; ?>.jpg" width="250" height="300" onerror="this.src='img/dvd-cover.jpg'">
                                <?php echo in_array($moviesarray[$key], $favarray) ? '<div class="text-center"><b>Remover dos Favoritos</b></div>' : '<div class="text-center"><b>Adicionar aos Favoritos</b></div>'; ?>
                            </div>


                            <div class="card-body">

                                <div class="d-grid gap-2">
                                    <a href="<?php echo route('filmes/' . $movie->id); ?>" class="btn btn-primary"><?php echo $movie->name ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>



            <?php else : ?>
                <!-- vista sem filmes favoritos -->
                <?php foreach ($movies as $movie) : ?>
                    <div class="col-3 d-flex justify-content-center">

                        <div class="card my-2">

                            <div id="<?php echo $movie->id; ?>" class="favoritos content_img ">
                                <img src="covers/<?php echo $movie->id; ?>.jpg" width="250" height="300" onerror="this.src='img/dvd-cover.jpg'">
                                <div class="text-center"><b>Adicionar aos Favoritos</b></div>
                            </div>


                            <div class="card-body">

                                <div class="d-grid gap-2">
                                    <a href="<?php echo route('filmes/' . $movie->id); ?>" class="btn btn-primary"><?php echo $movie->name ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {



            if ($("#lista_favoritos").children().length <= 0) {
                $("#lista_favoritos").hide();
            }


            $(".favoritos").click(function() {
                var id = $(this).attr('id');



                $.ajax({
                    url: "<?php echo route('favoritos'); ?>",
                    type: "POST",
                    data: {
                        favorito: id,
                        user: "<?php echo $_SESSION['username']; ?>"
                    },
                    success: function(data) {
                        if (data == "") {
                            $("#" + id).removeClass("fade-in-image");
                            $("li #favorito" + id).remove();
                            $("#" + id).find(".text-center").html("<b>Adicionar aos Favoritos</b>");
                        } else {
                            $("#" + id).addClass("fade-in-image");
                            $("#lista_favoritos").append(data);
                            $("#" + id).find(".text-center").html("<b>Remover dos Favoritos</b>");

                        }

                    },
                    error: function(data) {
                        console.log("erro");
                    }
                });
            });
        });
    </script>

</body>

</html>