<?php include 'partials/header.php';?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Manage Category</h4>
                <a href="add-category.php" class="btn btn-primary m-3">Add Category</a>
                <?php
                    if(isset($_SESSION['cat_add'])) {
                        echo $_SESSION['cat_add'];
                        unset($_SESSION['cat_add']);
                    }

                    if(isset($_SESSION['cat_delete'])) {
                        echo $_SESSION['cat_delete'];
                        unset($_SESSION['cat_delete']);
                    }
                 ?>  
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-border">
                            <tr>
                                <th>SL No.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Featured</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>

                            <?php
                                $sql = "SELECT * FROM tb_catgory";
                                $res = mysqli_query($con, $sql);
                                $count  = mysqli_num_rows($res);

                                if($count > 0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td>
                                                <?php
                                                    if($row['image_name'] != "") {
                                                ?>
                                                    <img width="120" src="<?php echo SITEURL; ?>/assets/images/<?php echo $row['image_name']; ?>" alt="">
                                                <?php
                                                    } else {
                                                        echo 'No Image Found!';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['featured']; ?></td>
                                            <td><?php echo $row['active']; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btn btn-success">Edit</a>
                                                <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                    }
                            
                                    ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'partials/footer.php';?>