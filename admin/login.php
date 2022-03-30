<?php

include ('../config/constant.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <h4 class="title">Login</h4>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" value="Login" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'"; 

        $res = mysqli_query($con, $sql) or die(mysqli_error());

        if($res == true) {
            $count = mysqli_num_rows($res);

            if($count == 1) {                
                $_SESSION['admin_login'] = 'Admin delete successfully';
                $_SESSION['username'] = $username;
                header('location:' .SITEURL.'admin/index.php');
        
            }
        }
    }
?>