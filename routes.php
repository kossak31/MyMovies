<?php


$router->get('', function () {
    require 'controllers/menu.php';
});








//FILMES, show, post
$router->get('filmes', function () {
    require 'controllers/movies/movies.list.php';
});

$router->get('filmes/(\d+)', function ($id) {
    require "controllers/movies/movies.show.php";
});

$router->post('filmes', function () {
    require 'controllers/movies/movies.add.php';
});












//ATORES, show, post
$router->get('atores', function () {
    require 'controllers/actors/actors.list.php';
});

$router->get('atores/(\d+)', function ($id) {
    require "controllers/actors/actors.show.php";
});

$router->post('atores', function () {
    require 'controllers/actors/actors.add.php';
});











//GENEROS, show, post
$router->get('generos', function () {
    require 'controllers/genres/genres.list.php';
});


$router->get('generos/(\d+)', function ($id) {
    require 'controllers/genres/genres.show.php';
});


$router->post('generos', function () {
    require 'controllers/genres/genres.add.php';
});








//REALIZADORES, show, post

$router->get('realizadores', function () {
    require 'controllers/directors/directors.list.php';
});

$router->get('realizadores/(\d+)', function ($id) {
    require 'controllers/directors/directors.show.php';
});

$router->post('realizadores', function () {
    require 'controllers/directors/directors.add.php';
});











//ADMIN CRUD
$router->get('admin/filmes', function () {
    require 'controllers/admin/movies.index.php';
});

$router->patch('filmes/(\d+)', function ($id) {
    require "controllers/admin/filmes.edit.php";
});

$router->get('admin/generos', function () {
    require 'controllers/admin/genres.index.php';
});

$router->patch('generos/(\d+)', function ($id) {
    require "controllers/admin/genres.edit.php";
});

$router->get('admin/atores', function () {
    require 'controllers/admin/actors.index.php';
});

$router->patch('atores/(\d+)', function ($id) {
    require "controllers/admin/actors.edit.php";
});

$router->get('admin/realizadores', function () {
    require 'controllers/admin/directors.index.php';
});

$router->patch('realizadores/(\d+)', function ($id) {
    require "controllers/admin/directors.edit.php";
});









//form create
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








//form edit
$router->get('admin/filmes/(\d+)/editar', function ($id) {
    require "controllers/admin/movies.edit.php";
});

$router->get('admin/generos/(\d+)/editar', function ($id) {
    require "controllers/admin/genres.edit.php";
});

$router->get('admin/atores/(\d+)/editar', function ($id) {
    require "controllers/admin/actors.edit.php";
});

$router->get('admin/realizadores/(\d+)/editar', function ($id) {
    require "controllers/admin/directors.edit.php";
});










$router->post('upload', function () {
    require "controllers/admin/upload_image.php";
});

$router->post('destroy_add_actions', function () {
    require "controllers/admin/ajax_destroy_add.php";
});







//delete
$router->delete('admin/filmes/(\d+)', function ($id) {
    require 'controllers/admin/movies.delete.php';
});

$router->delete('admin/generos/(\d+)', function ($id) {
    require 'controllers/admin/genres.delete.php';
});

$router->delete('admin/atores/(\d+)', function ($id) {
    require 'controllers/admin/actors.delete.php';
});

$router->delete('admin/realizadores/(\d+)', function ($id) {
    require 'controllers/admin/directors.delete.php';
});







//login
$router->post('login', function () {
    require 'controllers/login.php';
});


$router->get('logout', function () {
    require 'controllers/logout.php';
});

$router->post('new-user', function () {
    require 'controllers/new-user/new-user.php';
});

$router->get('autologin\?email\=(\\S+@\\S+\\.\\S+)\&token=(\w+)', function () {
    require 'controllers/new-user/new-password.php';
});

$router->post('set-password', function () {
    require 'controllers/new-user/set-password.php';
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

//link de recuperação de password
$router->get('reset-password\?email\=(\\S+@\\S+\\.\\S+)\&code=(\w+)', function () {
    require 'controllers/recover/recover.php';
});

$router->post('reset-password', function () {
    require 'controllers/recover/reset-password.php';
});


//search 
$router->get('search\?search\=(\w+)', function () {
    require 'controllers/search.php';
});

$router->post('favoritos', function () {
    require 'controllers/favorite.php';
});