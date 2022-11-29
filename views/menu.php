<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyMovies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body style="background-image: url('img/background.jpg');">

    <style>
        .maintdleft {
            width: 110px;
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
            font-size: 1em;
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
            font-size: 1em;
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
                    <form id="search" style="margin: 5px;">
                        <input id="procurar" type="text" name="search" placeholder="procurar por filme">

                    </form>

                </div>




                <div class="menuside" title="Escolha um género em baixo">
                    <b>Géneros</b>
                </div>
                <?php foreach ($genres as $genre) : ?>
                    <a href="<?php echo route('generos/' . $genre->id) ?>" class="menuleft"><?php echo $genre->name; ?></a>
                <?php endforeach ?>



            </td>
            <td class="maintd">
                <div id="news">

                    <?php if (\App\Session::has('info')) : ?>
                        <div class="alert <?php echo \App\Session::getInfo()['type']; ?>" role="alert">
                            <?php echo \App\Session::getInfo()['msg']; ?>
                        </div>
                        <?php unset($_SESSION['info']); ?>
                    <?php endif; ?>


                    <div class="d-flex justify-content-center">
                        <img src="img/logo.png" width="300px" height="150px">
                    </div>

                    <h2>onde encontrar o código fonte:</h2>
                    <p>este projecto em PHP está no <a href="https://github.com/kossak31/MyMovies">github</a> pelo utilizador <b>kossak31</b> no seguinte repositório chamado <b>MyMovies</b></p>
                    <p>a base de dados é MySql e existe diagrama ER no seguinte <a href="sql/diagrama_ER.png">link</a>
                    <h3>Acerca do projecto:</h3>

                    <p>Esta plataforma permite inserir filmes, atores, géneros e realizadores numa base de dados MySQL usando um MVC simples.</p>
                    <p>Também é possivel listar filmes por género, realizador ou por actor.</p>
                    <p>a página principal tem um menu que permite listar por filmes, atores e realizadores.
                        Um formulario de login, procurar por género, selecionar o último filme inserido e um filme aleatório.</p>

                    <p>caso nao seja adicionado uma capa no filme aparece uma imagem por defeito.</p>

                    <h3>administração do MyMovies:</h3>
                    <p>Existe um utilizador <b>admin</b> com a password <b>"Password@123"</b> permite gerir a plataforma.</p>

                    <p>O utilizador admin acede a um sistema CRUD (Create Read Update Delete) com os seguintes tipos:</p>
                    <ul>
                        <li>Filmes</li>
                        <li>Generos</li>
                        <li>Realizadores</li>
                        <li>Actores</li>
                    </ul>

                    <p>Existe um sistema de alertas que permite ao utilizador saber se o filme foi inserido.</p>

                    <p>para executar os seguintes testes do PHPUnit:</p>
                    <ul>
                        <li>phpunit --filter testRotas tests/RoutesTest.php</li>
                        <li>phpunit --filter testRotaPOST tests/RoutesTest.php</li>
                        <li>phpunit --filter testRotaDelete tests/RoutesTest.php</li>
                    </ul>

                </div>
            </td>
            <td class="maintdright">


                <div class="menuright">
                    <?php if ($login == false) : ?>

                        <div align="center" style="margin-top: 5px; margin-bottom: 5px;">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Novo Utilizador
                            </a>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Insira um utilizador e e-mail</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo route('new-user'); ?>" method="POST">

                                            <div class="mb-3">
                                                <input type="text" name="username" class="form-control" placeholder="username" require>
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" name="email" class="form-control" placeholder="email" require>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Novo Registo</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>




                        <form action="<?php echo route('login'); ?>" method="POST">
                            <table align="center">
                                <tr>
                                    <td>
                                        <input type="text" placeholder="username" name="username">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="password" placeholder="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-grid gap-2 mx-auto"><input type="submit" class="btn btn-warning " value="Entrar"></div>

                                    </td>
                                </tr>
                            </table>
                        </form>
                        <div align="center" style="margin-top: 5px; margin-bottom: 5px;"><a href="<?php echo route('check-email'); ?>">Recuperar Password</a></div>
                    <?php else : ?>
                        <div align="center" style="margin-top: 5px; margin-bottom: 5px;">
                            <a class="btn btn-danger" href="<?php echo route('logout'); ?>">logout</a>
                        </div>
                    <?php endif ?>

                </div>


                <?php if (isset($lastMovie->id)) : ?>
                    <div style="background-color: #e9e9e6;">

                        <div class="menuside" style="border-right-width: 0px; margin-top: 10px; text-align: center;">Último registo</div>


                        <table align="center" style="width: 98px; height: 15px;">
                            <tr>
                                <td width="1%"></td>
                                <td style="width: 49%;"><a href="http://www.youtube.com/embed/<?php echo $lastMovie->trailer; ?>" target="_blank" style="font-weight: normal; width: 100%;">Trailer</a></td>
                            </tr>
                        </table>
                        <div style="text-align: center; top: -2px; "><a href="<?php echo route('filmes/' . $lastMovie->id); ?>" title="Clique para ver mais..."><img src="covers/<?php echo $lastMovie->id; ?>.jpg" width=190 height=290 onerror="this.src='img/dvd-cover.jpg'"></a></div>

                        <div style="text-align: center; margin-top: 3px;"><a href="<?php echo route('filmes/' . $lastMovie->id); ?>"><?php echo $lastMovie->name; ?></a></div>


                    </div>
                <?php endif ?>


                <?php if (isset($randomMovie->id)) : ?>
                    <div style="background-color: #e9e9e6;">
                        <div class="menuside" style="border-right-width: 0px; margin-top: 10px; text-align: center;">Filme Aleatório</div>



                        <table align="center" style="width: 98px; height: 15px;">
                            <tr>
                                <td width="1%"></td>
                                <td style="width: 49%;"><a href="http://www.youtube.com/embed/<?php echo $randomMovie->trailer; ?>" target="_blank" class="sbutton trailer" title="Mais Uma Rodada" style="font-weight: normal; width: 100%;">Trailer</a></td>
                            </tr>
                        </table>
                        <div style="text-align: center; top: -2px;  "><a href="<?php echo route('filmes/' . $randomMovie->id); ?>" title="Clique para ver mais..."><img src="covers/<?php echo $randomMovie->id; ?>.jpg" width=190 height=290 onerror="this.src='img/dvd-cover.jpg'"></a></div>

                        <div style="text-align: center; margin-top: 3px;"><a href="<?php echo route('filmes/' . $randomMovie->id); ?>"><?php echo $randomMovie->name; ?></a></div>


                    </div>
                <?php endif ?>


                <script>
                    $(document).ready(function() {
                        $('#search').keyup(function() {
                            var query = $("#procurar").val();
                            if (query != '') {
                                $.ajax({
                                    url: "<?php echo route('search'); ?>",
                                    method: "GET",
                                    data: {
                                        search: query
                                    },
                                    success: function(data) {
                                        if (data == '') {
                                            $('#news').html('<h1>sem resultados na pesquisa</h1>');
                                        } else {
                                            $('#news').hide().html(data).fadeIn(500);
                                        }
                                    }
                                });
                            } else {
                                $('#news').html('<div class="row text-center img-fluid"><img src="img/logo.png"></div>');
                            }
                        });
                    });
                </script>

</body>

</html>