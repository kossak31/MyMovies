<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<body>

    <?php require 'views/navbar.php'; ?>

    <div class="container">


        <?php if (\App\Session::has('actions')) : ?>
            <?php foreach ($_SESSION['actions']['add'] as $action) : ?>



                <div id="myAlert<?php echo $action['id']; ?>" class="alert alert-dismissible fade show <?php echo $action['type']; ?>" role="alert">
                    <?php echo $action['msg']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>




                <script>
                    const myAlert<?php echo $action['id']; ?> = document.getElementById('myAlert<?php echo $action['id']; ?>')
                    myAlert<?php echo $action['id']; ?>.addEventListener('closed.bs.alert', event => {
                        $.ajax({
                            url: 'destroy_add_actions',
                            type: 'POST',
                            data: {
                                id: <?php echo $action['id']; ?>
                            },
                            success: function(data) {
                                console.log(data);
                            }

                        })

                    })
                </script>
            <?php endforeach ?>

        <?php else : ?>

            <h1>nenhuma actividade registada</h1>


        <?php endif; ?>



    </div>
</body>

</html>