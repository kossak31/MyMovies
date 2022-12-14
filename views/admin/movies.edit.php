<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar <?php echo $movie->name; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body style="background-image: url('img/background.jpg');">

    <?php require 'views/navbar.php'; ?>

    <div class="container">


        <h1>Editar Filme</h1>


        <form action="<?php echo route('filmes/' . $movie->id); ?>" method="POST">

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">nome do filme</label>
                <input type="text" name="nome" class="form-control" id="" value="<?php echo $movie->name; ?>">
            </div>

            <?php foreach ($genres as $genre) : ?>
                <?php $array[] = $genre->name; ?>
            <?php endforeach ?>
            <?php foreach ($genrex as $x) : ?>
                <?php $z[] = $x->name; ?>
            <?php endforeach ?>

            <?php foreach ($actors as $actor) : ?>
                <?php $actorarray[] = $actor->name; ?>
            <?php endforeach ?>
            <?php foreach ($actorx as $p) : ?>
                <?php $y[] = $p->name; ?>
            <?php endforeach ?>





            <div class="row">

                <div class="col">
                    <label for="">Selecionar Atores:</label>
                    <select class="form-select" name="actor_id[]" multiple required>
                        <?php foreach ($actors as $key => $actor) : ?>
                            <option value="<?php echo $actor->id; ?>" <?php echo in_array($actorarray[$key], $y) ? 'selected' : ''; ?>><?php echo $actor->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Selecionar Generos</label>
                        <select class="form-select" name="genres_id[]" multiple>
                            <?php foreach ($genres as $key => $genre) : ?>
                                <option value="<?php echo $genre->id; ?>" <?php echo in_array($array[$key], $z) ? 'selected' : ''; ?>><?php echo $genre->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="mb-3">
                <label for="">Selecionar Realizador:</label>
                <select class="form-select" name="director" required>
                    <?php foreach ($directors as $director) : ?>
                        <option value="<?php echo $director->id; ?>" <?php echo $movie_director->id == $director->id ? 'selected' : ''; ?>><?php echo $director->name; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>


            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Pa??s de Origem:</label>
                    <input type="text" name="country" class="form-control" value="<?php echo $movie->country; ?>" required>
                </div>

                <div class="col">
                    <label for="name" class="form-label">Ano de lan??amento:</label>
                    <input type="text" name="year" class="form-control" value="<?php echo $movie->year; ?>" required>
                </div>
            </div>


            <div class="mb-3">
                <label for="name" class="form-label">Trailer do Filme:</label>
                <input type="text" name="trailer" class="form-control" value="<?php echo $movie->trailer; ?>" required>
            </div>

            <button class="btn btn-primary" type="submit">Editar filme</button>

        </form>
        <div class="row">

            <div class="col-6">

                <div id="cover">
                    <img src="../../../covers/<?php echo $id ?>.jpg" height=100 onerror="this.src='../../../img/dvd-cover.jpg'">
                </div>
                <div id="preview"></div>
            </div>

            <div class="col-6">

                <form id="form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <input id="uploadImage" type="file" accept="image/jpg" name="image" />


                    <button class="btn btn-warning" type="submit">upload cover</button>
                </form>

            </div>


        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#form").on('submit', (function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "<?php echo route('upload'); ?>",
                    type: "POST",
                    data: formData,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log("sucesso no envio");
                        $('#cover').hide();
                        $("#preview").html(data).fadeIn();
                        $("#form")[0].reset();
                    },
                    error: function(data) {
                        console.log("erro no envio");
                    }
                });
            }));
        });
    </script>



</body>

</html>