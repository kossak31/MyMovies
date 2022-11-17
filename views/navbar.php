<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo route(''); ?>">MyMovies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">

                <?php if ($login == false && $username != 'admin') : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('filmes'); ?>">Listar Filmes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('atores'); ?>">Listar Atores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('realizadores'); ?>">Listar Realizadores</a>
                    </li>

                <?php endif; ?>
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


                    <li class="nav-item mr-auto">
                        <a class="nav-link" href="<?php echo route('logout'); ?>">Logout</a>
                    </li>

                <?php endif ?>


            </ul>

        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>