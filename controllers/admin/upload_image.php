<?php

$path = 'covers/'; // upload directory


$id = $_POST['id'];

$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = $id . "." . $ext;
// check's valid format



$path = $path . strtolower($final_image);

if (move_uploaded_file($tmp, $path)) {

   redirect("admin/filmes/" . $id . "/editar");
}
