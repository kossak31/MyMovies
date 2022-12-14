<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-image: url('img/background.jpg');">

    <form action="<?php echo route('set-password'); ?>" method="post">
        <input type="password" name="password1">
        <input type="password" name="password2">
        <input type="text" name="email" value="<?php echo $_GET['email']; ?>">
        <input type="text" name="token" value="<?php echo $_GET['token']; ?>">
        <input type="submit" value="definir password">

    </form>

</body>

</html>