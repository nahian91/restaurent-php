<?php

include ('../config/constant.php');

$id = $_GET['id'];

$del = "DELETE FROM tb_catgory WHERE id = $id";

$res = mysqli_query($con, $del) or die(mysqli_error());

if($res == true) {
    $_SESSION['cat_delete'] = 'Categoy delete successfully';
    header('location:' .SITEURL.'admin/manage-category.php');
}