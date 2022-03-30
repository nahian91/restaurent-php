<?php include 'partials/header.php';?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Add Category</h4>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <label for="">Select Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="">Featured?</label>
                                <input type="radio" name="featured" value="yes">Yes
                                <input type="radio" name="featured" value="No">No
                            </div>
                            <div class="mb-3">
                                <label for="">Active?</label>
                                <input type="radio" name="active" value="yes">Yes
                                <input type="radio" name="active" value="no">No
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['submit'])) {
                $title  = $_POST['title'];

                if(isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../assets/images/".$image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);
                    if($upload == false) {
                        echo 'Sorry';
                    }
                }

                if(isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                } else {
                    $featured = 'No';
                }

                if(isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = 'No';
                }

                $sql = "INSERT into tb_catgory SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active'";

                $res = mysqli_query($con, $sql);

                if($res == true) {
                    $_SESSION['cat_add'] = 'Category Added Successfully';
                    header('location:' .SITEURL.'admin/manage-category.php');
                }
            }
        ?>

        <?php include 'partials/footer.php';?>