<?php

$path = 'covers/'; // upload directory


$id = $_POST['id'];

$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

$final_image = $id . "." . $ext;


$path = $path . strtolower($final_image);

if (move_uploaded_file($tmp, $path)) {

   redirect("admin/filmes/" . $id . "/editar");
}
