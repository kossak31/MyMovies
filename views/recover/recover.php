<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Password</title>
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

<div class="container">

    <div class="row">
        
        <main class="form-signin w-100 m-auto">

            <form action="reset-password" method="POST">
                <h4>Indique a nova password:</h4>
                <input type="text" name="pass1" class="form-control" placeholder="Nova password" required>
                <input type="text" name="pass2" class="form-control mt-2" placeholder="Repetir password password" required>
                <input type="text" name="code" value="<?php echo $_GET['code']; ?>">
                <input type="submit" name="reset" value="Reset Password" class="form-control btn btn-warning mt-2">
            </form>





        </main>

    </div>
</div>
</body>

</html>