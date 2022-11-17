<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <style>
        font,
        th,
        td,
        p,
        li,
        div {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-weight: normal;
        }



        .maintdleft {
            width: 109px;
            border-right: 1px solid #999999;
            background-color: #e9e9e6;
        }

        .maintdright {
            width: 110px;
            border-left: 1px solid #999999;
            background-color: #e9e9e6;
        }


        .marginleft,
        A.menuleft {
            display: block;
            font-weight: normal;
            font-size: 11px;
            border-bottom: 1px dashed #999999;
            color: #000000;
            text-decoration: none;
            text-align: left;
            padding: 2px 2px 2px 4px;
        }

        A.menuleft:VISITED {
            color: #000000;
        }

        A.menuleft:HOVER {
            background-color: #999999;
            color: #FFFFFF;
            border-bottom: 1px solid #000;
        }


        A.menuside,
        .menuside {
            display: block;
            font-weight: bold;
            background-color: #999999;
            border-bottom: 1px dashed #e9e9e6;
            color: #FFFFFF;
            text-decoration: none;
            text-align: center;
            padding: 2px 0px 3px 0px;
            text-transform: uppercase;
        }

        A.menuside:VISITED {
            color: #FFFFFF;
        }

        A.menuside:HOVER {
            background-color: #000000;
            color: #FFFFFF;
        }

        .maintd {
            width: 630px;
            background-color: #FFFFFF;
            padding: 5px 10px 10px 10px;
        }

        .menuright,
        A.menuright {
            display: block;
            font-weight: normal;
            font-size: 11px;
            border-bottom: 1px dashed #999999;
            color: #000000;
            text-decoration: none;
            text-align: left;
            padding: 2px 2px 4px 3px;
        }

        A.menuright:VISITED {
            color: #000000;
        }

        A.menuright:HOVER {
            background-color: #999999;
            color: #FFFFFF;
            border-bottom: 1px solid #000;
        }
    </style>


    <?php require 'views/navbar.php' ?>

    <table class="table">
        <tr valign="top">
            <td class="maintdleft">

                <div class="menuleft">
                    <form action="" style="margin: 5px;">
                        <input type="search" name="search" id="">
                        <input type="submit" value="Procurar">
                    </form>

                </div>




                <div class="menuside" title="Escolha um género em baixo">
                    <b>Géneros</b>
                </div>
                <?php foreach ($genres as $genre) : ?>
                    <a href="<?php echo route('genero/' . $genre->id) ?>" class="menuleft"><?php echo $genre->name; ?></a>
                <?php endforeach ?>



            </td>
            <td class="maintd">
                <div id="news">

                <div class="d-flex justify-content-center">
                    <img src="logo/logo.png" alt="logo" width="300px" height="150px">

                </div>

                    <h3>O que isto faz:</h3>

                    <p>Esta plataforma permite recomendar filmes e fazer de base de dados</p>
                    <p>a página principal tem um formulario de login, procurar por género e listar o último filme inserido.</p>

                    <h3>administração do MyMovies:</h3>
                    <p>Existe um utilizador <b>admin</b> com a password <b>"Password@123"</b> permite gerir a plataforma.</p>

                    <p>O utilizador admin acede a um sistema CRUD (Create Read Update Delete) com os seguintes tipos:</p>
                    <ul>
                        <li>Filmes</li>
                        <li>Generos</li>
                        <li>Realizadores</li>
                        <li>Actores</li>
                    </ul>


                </div>
            </td>
            <td class="maintdright">


                <div class="menuright">
                    <?php if ($login == false) : ?>

                        <form action="<?php echo route('login'); ?>" method="POST">
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <input type="text" name="username">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="btn btn-primary" value="Entrar"></td>
                                </tr>
                            </table>
                        </form>
                        <div align="center" style="margin-top: 5px; margin-bottom: 5px;"><a href="index.php?op=Join" style="font-size: 9px;">Ainda não se registou?</a></div>
                    <?php else : ?>
                        <div align="center" style="margin-top: 5px; margin-bottom: 5px;">
                            <a class="btn btn-danger" href="<?php echo route('logout'); ?>">logout</a>
                        </div>
                    <?php endif ?>

                </div>


                <?php if (isset($lastMovie->id)) : ?>
                    <div class="menuside" style="border-right-width: 0px; margin-top: 10px; text-align: center;">Ultimo registo</div>
                    <table>
                        <tr>
                        <tr align="center">
                            <td width="300px" valign="top" align="center" style="background-color: #e9e9e6; padding-top: 2px; padding-bottom: 4px;">


                        <tr align="center">
                            <td width="117" valign="top" align="center" style="background-color: #e9e9e6; padding-top: 2px; padding-bottom: 4px;">

                                <table style="width: 98px; height: 15px;">
                                    <tr>
                                        <td width="1%"></td>
                                        <td style="width: 49%;"><a href="http://www.youtube.com/embed/3eaiw71A9Fw?autoplay=1&rel=0" target="_blank" class="sbutton trailer" title="Mais Uma Rodada" style="font-weight: normal; width: 100%;">Trailer</a></td>
                                    </tr>
                                </table>
                                <div style="top: -2px; position: relative; z-index: 0;"><a href="<?php echo route('filmes/' . $lastMovie->id); ?>" title="Clique para ver mais..."><img class="pic_tn" src="covers/<?php echo $lastMovie->id; ?>.jpg" width=100 height=140 onerror="this.src='covers/dvd-cover.jpg'"></a></div>

                                <div style="text-align: center; margin-top: 3px;"><a href="<?php echo route('filmes/' . $lastMovie->id); ?>"><?php echo $lastMovie->name; ?></a></div>

                    </table>
                <?php endif ?>


                <?php if (isset($randomMovie->id)) : ?>
                    <div class="menuside" style="border-right-width: 0px; margin-top: 10px; text-align: center;">Filme Aleatório</div>
                    <table>
                        <tr>
                        <tr align="center">
                            <td width="300px" valign="top" align="center" style="background-color: #e9e9e6; padding-top: 2px; padding-bottom: 4px;">


                        <tr align="center">
                            <td width="117" valign="top" align="center" style="background-color: #e9e9e6; padding-top: 2px; padding-bottom: 4px;">

                                <table style="width: 98px; height: 15px;">
                                    <tr>
                                        <td width="1%"></td>
                                        <td style="width: 49%;"><a href="http://www.youtube.com/embed/3eaiw71A9Fw?autoplay=1&rel=0" target="_blank" class="sbutton trailer" title="Mais Uma Rodada" style="font-weight: normal; width: 100%;">Trailer</a></td>
                                    </tr>
                                </table>
                                <div style="top: -2px; position: relative; z-index: 0;"><a href="<?php echo route('filmes/' . $randomMovie->id); ?>" title="Clique para ver mais..."><img class="pic_tn" src="covers/<?php echo $randomMovie->id; ?>.jpg" width=100 height=140 onerror="this.src='covers/dvd-cover.jpg'"></a></div>

                                <div style="text-align: center; margin-top: 3px;"><a href="<?php echo route('filmes/' . $randomMovie->id); ?>"><?php echo $randomMovie->name; ?></a></div>

                    </table>
                <?php endif ?>

                

</body>

</html>