<?php include 'partials/header.php';

if(isset($_SESSION['admin_login'])) {
    echo $_SESSION['admin_login'];
    unset($_SESSION['admin_login']);
}

?>
        <div class="row">
            <div class="col-xl-12">
                <h4 class="title">Dashboard</h4>
                <div class="row">
                    <div class="col-md-3">
                        <div class="single-box">
                            <h4>5 <span>categories</span></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-box">
                            <h4>5 <span>categories</span></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-box">
                            <h4>5 <span>categories</span></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-box">
                            <h4>5 <span>categories</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'partials/footer.php';?>