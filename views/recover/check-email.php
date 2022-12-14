<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
    }
</style>



<body style="background-image: url('img/background.jpg');">
    <div class="container">
        <div class="row">


            <?php if (\App\Session::has('info')) : ?>
                <div class="alert <?php echo \App\Session::getInfo()['type']; ?>" role="alert">
                    <?php echo \App\Session::getInfo()['msg']; ?>
                </div>
                <?php unset($_SESSION['info']); ?>
            <?php endif; ?>




            <main class="form-signin w-100 m-auto">

                <form action="check-email" method="POST">

                    <h3 class="mb-3">Recuperar password</h3>

                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Escreva o seu e-mail" class="form-control" required>

                    </div>
                    <div class="mb-3">
                        <input type="submit" name="reset_link" value="Enviar Link de Recuperação" class="w-100 btn btn-lg btn-warning">
                    </div>



                </form>
            </main>

        </div>
    </div>
</body>

</html>