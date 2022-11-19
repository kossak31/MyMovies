<?php


$router->get('', function () {
    require 'controllers/menu.php';
});

//FILMES
$router->get('filmes', function () {
    require 'controllers/movies/movies.list.php';
});

$router->get('filmes/(\d+)', function ($id) {
    require "controllers/movies/movies.show.php";
});


$router->post('filmes', function () {
    require 'controllers/movies/movies.add.php';
});

//ATORES
$router->get('atores', function () {
    require 'controllers/actors/actors.list.php';
});

$router->get('atores/(\d+)', function ($id) {
    require "controllers/actors/actors.show.php";
});


//rotas de admin
$router->get('admin/filmes', function () {
    require 'controllers/admin/movies.index.php';
});

$router->get('admin/filmes/criar', function () {
    require 'controllers/admin/movies.create.form.php';
});

$router->get('admin/generos/criar', function () {
    require 'controllers/admin/genres.create.form.php';
});

$router->get('admin/atores/criar', function () {
    require 'controllers/admin/actors.create.form.php';
});

$router->get('admin/realizadores/criar', function () {
    require 'controllers/admin/directors.create.form.php';
});

$router->get('admin/filmes/(\d+)/editar', function ($id) {
    require "controllers/admin/movies.edit.php";
});


$router->post('upload', function () {
    require "controllers/admin/upload_image.php";
});

$router->post('destroy_add_actions', function () {
    require "controllers/admin/ajax_destroy_add.php";
});

$router->delete('admin/filmes/(\d+)', function ($id) {
    require 'controllers/admin/movies.delete.php';
});


//login
$router->post('login', function () {
    require 'controllers/login.php';
});


$router->get('logout', function () {
    require 'controllers/logout.php';
});

//backlog
$router->get('status', function () {
    require 'controllers/status.php';
});

//formulario de recuperação de password por email
$router->get('check-email', function () {
    require 'views/recover/check-email.php';
    
});

$router->post('check-email', function () {
    require 'controllers/recover/check-email.php';
   
});



$router->get('reset-password\?email\=(\\S+@\\S+\\.\\S+)\&code=(\w+)', function () {
 
    require 'controllers/recover/recover.php';
});



$router->post('recover', function () {
    require 'controllers/recover.php';
});

$router->get('search\?search\=(\w+)', function () {
    require 'controllers/search.php';
});

$router->get('genero/(\d+)', function ($id) {
    require 'controllers/genres/genres.show.php';
});



//por apagar
//ver todos os livros
$router->get('livros', function () {
    require 'controllers/livros.index.php';
});

//show 1 livro
$router->get('livros/(\d+)', function ($id) {
    require "controllers/livros/livros.show.php";
});

//formulario inserir
$router->get('livros/create', function () {
    require "controllers/livros/add.php";
    require "views/livros/create.form.php";
});

//POST inserir
$router->post('livros', function () {
    require "controllers/livros/add.php";
});


$router->get('livros/(\d+)/edit', function ($id) {
    require "controllers/livros/edit.php";
});

//update
$router->patch('livros/(\d+)', function ($id) {
    require "controllers/livros/edit.php";
    redirect('livros');
});

//delete
$router->delete('livros/(\d+)', function ($id) {
    require "controllers/livros/delete.php";
});
