<?php

include ('../config/constant.php');


$id = $_GET['id'];

$delete = "DELETE FROM tb_admin WHERE id=$id";

$res = mysqli_query($con, $delete) or die(mysqli_error());

if($res == TRUE) {
    $_SESSION['admin_delete'] = 'Admin delete successfully';
    header('location:' .SITEURL.'admin/manage-admin.php');
} else {
    $_SESSION['admin_delete'] = 'Admin delete successfully';
    header('location:' .SITEURL.'admin/manage-admin.php');
}