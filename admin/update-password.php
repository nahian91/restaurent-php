<?php include 'partials/header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Update Password</h4>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="new_password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <button type="submit" name="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                $sql = "SELECT * FROM tb_admin WHERE id = $id and password = '$current_password'";

                $res = mysqli_query($con, $sql);

                if($res == true) {
                    $count = mysqli_num_rows($res);

                    if($count == 1) {
                        if($new_password == $confirm_password) {
                            $sql2 = "UPDATE tb_admin SET password = '$new_password' WHERE id = $id";

                            $res2 = mysqli_query($con, $sql2);
                            if($res2 == true) {
                                echo 'Added';
                            }
                        } else {
                            echo 'Not Match';
                        }
                    }
                }
            }
        ?>

        <?php include 'partials/footer.php';?>