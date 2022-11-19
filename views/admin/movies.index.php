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
        
        <?php if (\App\Session::has('info')) : ?>
            <div class="alert <?php echo \App\Session::getInfo()['type']; ?>" role="alert">
                <?php echo \App\Session::getInfo()['msg']; ?>
            </div>
            <?php unset($_SESSION['info']); ?>
        <?php endif; ?>




        <h1>Gerir todos os Filmes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">genero</th>
                    <th scope="col">capa</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie) : ?>
                    <tr>


                        <th scope="row"><?php echo $movie->id; ?></th>
                        <td> <a href="<?php echo route('filmes/' . $movie->id); ?>">
                                <?php echo $movie->name; ?> </a>
                        </td>


                        <td>
                            <?php foreach ($movie->genres as $genre) : ?>
                                <?php echo $genre->name; ?> <br>
                            <?php endforeach; ?>
                        </td>

                        <td>
                            <img src="<?php echo "../covers/" . $movie->id . ".jpg"; ?>" height="100px" width="100px" onerror="this.src='../covers/dvd-cover.jpg'">
                        </td>




                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-warning" href="<?php echo route('admin/filmes/' . $movie->id . '/editar'); ?>" role="button">Editar</a>
                                <form action="<?php echo route('admin/filmes/' . $movie->id); ?>" method="POST">
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