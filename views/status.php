<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>


<body style="background-image: url('img/background.jpg');">

    <?php require 'views/navbar.php'; ?>

    <div class="container">



        <?php if (isset($_SESSION['actions']['add']) && count($_SESSION['actions']['add']) > 0 || isset($_SESSION['actions']['delete']) && count($_SESSION['actions']['delete']) > 0 || isset($_SESSION['actions']['edit']) && count($_SESSION['actions']['edit']) > 0) : ?>

            <?php if (isset($_SESSION['actions']['add'])) : ?>
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
            <?php endif ?>

            <?php if (isset($_SESSION['actions']['delete'])) : ?>
                <?php foreach ($_SESSION['actions']['delete'] as $action) : ?>

                    <div id="delete<?php echo $action['id']; ?>" class="alert alert-dismissible fade show <?php echo $action['type']; ?>" role="alert">
                        <?php echo $action['msg']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>


                    <script>
                        const delete<?php echo $action['id']; ?> = document.getElementById('delete<?php echo $action['id']; ?>')
                        delete<?php echo $action['id']; ?>.addEventListener('closed.bs.alert', event => {
                            $.ajax({
                                url: 'destroy_delete_actions',
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
            <?php endif ?>

            <?php if (isset($_SESSION['actions']['edit'])) : ?>
                <?php foreach ($_SESSION['actions']['edit'] as $action) : ?>

                    <div id="edit<?php echo $action['id']; ?>" class="alert alert-dismissible fade show <?php echo $action['type']; ?>" role="alert">
                        <?php echo $action['msg']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>


                    <script>
                        const edit<?php echo $action['id']; ?> = document.getElementById('edit<?php echo $action['id']; ?>')
                        edit<?php echo $action['id']; ?>.addEventListener('closed.bs.alert', event => {
                            $.ajax({
                                url: 'destroy_edit_actions',
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
            <?php endif ?>



        <?php else : ?>

            <h1>nenhuma actividade registada</h1>


        <?php endif; ?>



    </div>
</body>

</html>