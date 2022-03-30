<?php include 'partials/header.php';?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Update Category</h4>
                <div class="row">
                    <div class="col-md-12">

                    <?php
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $sql = "SELECT * FROM tb_catgory WHERE id = $id";
                            $res = mysqli_query($con, $sql);
                            $count = mysqli_num_rows($res);

                            if($count == 1) {
                                $row = mysqli_fetch_assoc($res);

                                $title = $row['title'];
                                $image = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                            }
                        }
                    ?>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" value="<?php echo $title;?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Current Image</label>
                                <img src="<?php echo SITEURL;?>/assets/images/<?php echo $image;?>" width="120" alt="">
                            </div>
                            <div class="mb-3">
                                <label for="">New Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="">Featured?</label>
                                <input <?php if($featured == 'on') {echo 'checked';} ?> type="radio" name="featured" value="yes">Yes
                                <input <?php if($featured == 'off') {echo 'checked';} ?> type="radio" name="featured" value="no">No
                            </div>
                            <div class="mb-3">
                                <label for="">Active?</label>
                                <input <?php if($active == 'on') {echo 'checked';} ?> type="radio" name="active" value="yes">Yes
                                <input <?php if($active == 'off') {echo 'checked';} ?> type="radio" name="active" value="no">No
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'partials/footer.php';?>