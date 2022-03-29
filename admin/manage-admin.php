<?php include 'partials/header.php';?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Manage Admin</h4>
                <a href="add-admin.php" class="btn btn-primary m-3">Add Admin</a>

                <?php
                    if(isset($_SESSION['admin_add'])) {
                        echo $_SESSION['admin_add'];
                        unset($_SESSION['admin_add']);
                    }

                    if(isset($_SESSION['admin_delete'])) {
                        echo $_SESSION['admin_delete'];
                        unset($_SESSION['admin_delete']);
                    }

                    if(isset($_SESSION['admin_update'])) {
                        echo $_SESSION['admin_update'];
                        unset($_SESSION['admin_update']);
                    }

                    $sql = 'SELECT * from tb_admin';

                    $res = mysqli_query($con, $sql) or die(mysqli_error());
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-border">
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>

                            <?php
                                if($res == TRUE) {
                                    $count = mysqli_num_rows($res);

                                    if($count > 0) {
                                        while($rows = mysqli_fetch_assoc($res)) {
                                            $id = $rows['id'];
                                            $name = $rows['name'];
                                            $username = $rows['username'];
                                        ?>
                                            <tr>
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $username;?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn btn-success">Edit</a>
                                                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn btn-info text-white">Change Password</a>
                                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this Admin?')" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'partials/footer.php';?>