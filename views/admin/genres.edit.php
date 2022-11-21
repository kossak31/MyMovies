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


        <h1>Editar Género</h1>


        <form action="<?php echo route('generos/' . $genre->id); ?>" method="POST">

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-3">
                <label class="form-label">nome do género</label>
                <input type="text" name="name" class="form-control" id="" value="<?php echo $genre->name; ?>">
            </div>



            <button class="btn btn-primary" type="submit">Editar Género</button>


        </form>


    </div>


</body>

</html>