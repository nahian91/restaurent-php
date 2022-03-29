<?php include 'partials/header.php';

$id = $_GET['id'];





$update = "SELECT * FROM tb_admin WHERE id='$id'";


$res = mysqli_query($con, $update) or die(mysqli_error($con));

if($res == true) {
    $count  = mysqli_num_rows($res);

    if($count == 1) {
        $row = mysqli_fetch_assoc($res);

        $name = $row['name'];
        $username = $row['username'];
    }
}

?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Update Admin</h4>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <input type="text" name="fullname" class="form-control" value="<?php echo $name; ?>">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <button type="submit" name="submit" class="btn btn-primary">Update Admin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $fullname = $_POST['fullname'];
                $username = $_POST['username'];

                $sql = "UPDATE tb_admin SET
                name = '$fullname',
                username = '$username'
                WHERE id = '$id'
            ";

                $res = mysqli_query($con, $sql) or die(mysqli_error($con));

                if($res == TRUE) {
                    $_SESSION['admin_update'] = 'Admin updated successfully';
                    header('location:' .SITEURL.'admin/manage-admin.php');
                } else {
                    $_SESSION['admin_update'] = 'Admin updated successfully';
                    header('location:' .SITEURL.'admin/manage-admin.php');
                }
            }

            
        ?>

        <?php include 'partials/footer.php';?>