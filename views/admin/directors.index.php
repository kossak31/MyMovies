<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerir Atores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body style="background-image: url('img/background.jpg');">
    <?php require 'views/navbar.php'; ?>

    <div class="container">
        

        <h1>Gerir Realizadores</h1>


        <?php if (\App\Session::has('info')) : ?>
            <div class="alert <?php echo \App\Session::getInfo()['type']; ?>" role="alert">
                <?php echo \App\Session::getInfo()['msg']; ?>
            </div>
            <?php unset($_SESSION['info']); ?>
        <?php endif; ?>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
            

                </tr>
            </thead>
            <tbody>
                <?php foreach ($directors as $director) : ?>
                    <tr>


                        <th scope="row"><?php echo $director->id; ?></th>
                        <td> <a href="<?php echo route('realizadores/' . $director->id); ?>">
                                <?php echo $director->name; ?> </a>
                        </td>




                        <td>
                            <div class="btn-group" role="group" >
                                <a class="btn btn-warning" href="<?php echo route('admin/realizadores/' . $director->id . '/editar'); ?>" role="button">Editar</a>
                                <form action="<?php echo route('admin/realizadores/' . $director->id); ?>" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">    
                                    <button type="submit" class="btn btn-danger">Apagar</button>
                                </form>
                            </div>
                        </td>



                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>
</body>


</html>