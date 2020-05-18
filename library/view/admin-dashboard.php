<div class="content-wrapper mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
            </div>
        </div>

        <hr class="my-3">

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
                <div class="alert alert-success text-center">
                    <a href="./admin.php?page=listBook" class="alert-link"><i class="fa fa-book fa-5x"></i></a>
                    <h3><?php echo $countBooks ?></h3>
                    Books Listed
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
                <div class="alert alert-info text-center">
                    <a href="./admin.php?page=manage-category" class="alert-link"><i class="far fa-file-archive fa-5x"></i></a>
                    <h3><?php echo $countCategories ?></h3>
                    Listed Categories
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
                <div class="alert alert-warning text-center">
                    <a href="./admin.php?page=history" class="alert-link"><i class="fa fa-recycle fa-5x"></i></a>
                    <h3><?php echo $countReturned ?></h3>
                    History borrowed
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
                <div class="alert alert-danger text-center">
                    <a href="admin.php?page=list-users" class="alert-link"><i class="fa fa-users fa-5x"></i></a>
                    <h3><?php echo $countUser ?></h3>
                    Registered Users
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
                <div class="alert alert-warning text-center">
                    <a href="./admin.php?page=request" class="alert-link"><i class="fas fa-envelope fa-5x"></i></a>
                    <h3><?php echo $countRequest ?></h3>
                    Request
                </div>
            </div>
        </div>


        <hr class="my-3">

        <div class="row">
            <div class="col-md-12 col-sm-10 col-xs-12 col-md-offset-1 mx-auto my-3">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="image/1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="image/3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>