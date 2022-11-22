<?php

$path = 'covers/'; // upload directory

$id = $_POST['id'];
unlink('covers/' . $id . '.jpg');

$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

$final_image = $id . "." . $ext;

$path = $path . strtolower($final_image);

if (move_uploaded_file($tmp, $path)) {
   echo '<img height=100 src="../../../covers/' . $id . '.jpg?123" />';
}
