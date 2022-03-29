<?php include 'partials/header.php';?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Add Admin</h4>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'partials/footer.php';?>


        <?php
            if(isset($_POST['submit'])) {
                
                $fullname  = $_POST['fullname'];
                $username  = $_POST['username'];
                $password  = md5($_POST['password']);

                $sql = "INSERT into tb_admin SET
                    name = '$fullname',
                    username = '$username',
                    password = '$password'
                ";

                $res = mysqli_query($con, $sql) or die(mysqli_error());

                if($res == TRUE) {
                    $_SESSION['admin_add'] = 'Admin added successfully';
                    header('location:' .SITEURL.'admin/manage-admin.php');
                } else {
                    $_SESSION['admin_add'] = 'Admin added successfully';
                    header('location:' .SITEURL.'admin/manage-admin.php');
                }
                
            }

        ?>