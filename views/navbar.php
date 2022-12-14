<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo route(''); ?>">MyMovies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarsExample03">


            <ul class="navbar-nav me-auto mb-2 mb-sm-0">

                <!-- menu user -->
                <?php if ($username != 'admin') : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('filmes'); ?>">Listar Filmes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('atores'); ?>">Listar Atores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('realizadores'); ?>">Listar Realizadores</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('top-favoritos'); ?>">Top Favoritos</a>
                    </li>

                <?php endif; ?>

                <!-- menu admin -->
                <?php if ($login == true && $username == 'admin') : ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filmes
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="<?php echo route('filmes'); ?>">Listar Filmes</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/filmes/criar') ?>">Inserir Filme</a>
                            </li>


                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/filmes'); ?>">Gerir Filmes</a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Géneros
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="<?php echo route('generos'); ?>">Listar Géneros</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/generos/criar') ?>">Inserir Género</a>
                            </li>


                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/generos'); ?>">Gerir Géneros</a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Actores
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="<?php echo route('atores'); ?>">Listar Atores</a>
                            </li>


                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/atores/criar') ?>">Inserir Ator</a>
                            </li>


                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/atores'); ?>">Gerir Atores</a>
                            </li>


                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Realizadores
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="<?php echo route('realizadores'); ?>">Listar Realizadores</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/realizadores/criar') ?>">Inserir Realizador</a>
                            </li>


                            <li>
                                <a class="dropdown-item" href="<?php echo route('admin/realizadores'); ?>">Gerir Realizadores</a>
                            </li>


                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('status'); ?>">Registo de Acções</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('logout'); ?>">Logout</a>
                    </li>

                <?php endif ?>


            </ul>

            <?php if ($username == true &&  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] == 'http://localhost/Movies/filmes') : ?>
                <div class="lista navbar-nav">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0 dropstart">


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Favoritos
                            </a>
                            <ul id="lista_favoritos" class="dropdown-menu">

                                <?php foreach ($favoriteMovies as $favoriteMovie) : ?>
                                    <li id="favorito<?php echo $favoriteMovie->id; ?>"><a class="dropdown-item" href="<?php echo route('filmes/' . $favoriteMovie->id); ?>"><?php echo $favoriteMovie->name; ?></a></li>
                                <?php endforeach; ?>


                            </ul>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>



        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>