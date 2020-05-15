<?php
session_start();

require 'config.php';
require "model/database/DBConnect.php";

require 'model/user/User.php';
require 'model/user/UserDB.php';
require 'model/ticket/Ticket.php';
require 'model/ticket/TicketDB.php';
require 'model/Category/Category.php';
require 'model/Category/CategoryDB.php';
require 'model/book/Book.php';
require 'model/book/BookDB.php';

require 'controller/CategoryController.php';
require 'controller/BookController.php';
require 'controller/UserController.php';
require 'controller/TicketController.php';

use controller\UserController;
use controller\TicketController;
use controller\CategoryController;
use controller\BookController;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<?php if (!isset($_SESSION['isLogin']) && !isset($_SESSION['role'])): ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!--        BRAND LOGO-->
            <a class="navbar-brand" href="index.php"><img src="image/logo2.png" class="ml-3" style="width: 70px"></a>

            <!--            TOGGLE-BUTTON-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--            OPTIONAL-->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php?page=login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php?page=register" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php elseif ($_SESSION['role'] == 5): ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <!--        BRAND LOGO-->
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php"><img src="image/logo2.png" class="ml-3" style="width: 70px"></a>

            <!--            TOGGLE-BUTTON-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="navbar-collapse dropdown">
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-collapse dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Books
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./index.php?page=listBook">List Books</a>
                            <a class="dropdown-item" href="./index.php?page=borrow">Borrow books</a>
                            <a class="dropdown-item" href="./index.php?page=listBorrowed">Borrowed books</a>
                        </div>
                    </li>
                </ul>

                <!--                EDIT PROFILE, CHANGE PSW, LOGOUT-->
                <ul class="navbar-nav mr-5">
                    <li class="navbar-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                            <img src="<?php echo 'image/' . $_SESSION['avatar']; ?>" class="avatar"
                                 alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./index.php?page=edit-profile">Edit Profile</a>
                            <a class="dropdown-item" href="./index.php?page=change-psw">Change Password</a>
                            <a class="dropdown-item" href="./index.php?page=logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
<div class="container-fluid">
    <?php
    $ticketController = new TicketController();
    $userController = new UserController();
    $bookController = new BookController();
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    if (!isset($_SESSION['isLogin'])) {
        switch ($page) {
            case 'login':
                $userController->login();
                break;
            case 'register':
                $userController->register();
                break;
            default:
        }
    } else {
        switch ($page) {
            case 'logout':
                $userController->logout();
                break;
            case 'change-psw':
                $userController->changePsw();
                break;
            case 'edit-profile':
                $userController->edit('index.php');
                break;
            case 'borrow':
                $ticketController->add();
                break;
            case 'listBorrowed':
                $ticketController->listBorrowed();
                break;
            case 'listBook':
                $bookController->listBook();
                break;
            case 'searchBook':
                $bookController->search();
                break;
        }

    }

    ?>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
