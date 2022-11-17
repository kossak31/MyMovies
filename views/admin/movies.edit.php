<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body>

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

            <label for="" class="form-label">Selecionar Generos</label>
            <select class="form-select" name="genres_id[]" multiple>
                <?php foreach ($genre as $g) : ?>
                    <option value="<?php echo $g->id; ?>" <?php echo $movie->id == $g->movie_id ? 'selected' : ''; ?>>
                        <?php echo $g->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button class="btn btn-primary" type="submit">Editar filme</button>


        </form>

        <form action="<?php echo route('upload'); ?>" method="POST" id="form" enctype="multipart/form-data">
            <input type="text" name="id" value="<?php echo $id; ?>">

            <input id="uploadImage" type="file" accept="image/jpg" name="image" />
            <div id="preview"></div><br>

            <button class="btn btn-primary" type="submit">upload cover</button>
        </form>
        <div id="err"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $("#form").on('submit', (function(e) {

                e.preventDefault();

                var serializedData = $("#form").serialize();

                $.ajax({
                    url: <?php echo route('upload'); ?>,
                    type: "POST",
                    data: serializedData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    

                    success: function(data) {
                        if (data == 'invalid') {
                            // invalid file format.
                            $("#err").html("Invalid File !").fadeIn();
                        } else {
                            // view uploaded file.
                            $("#preview").html(data).fadeIn();
                            $("#form")[0].reset();
                        }
                    },
                    error: function(e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });
    </script>



</body>

</html>