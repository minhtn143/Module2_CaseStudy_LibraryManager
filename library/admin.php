<?php
session_start();

require 'config.php';
require "model/database/DBConnect.php";

require 'model/user/User.php';
require 'model/user/UserDB.php';
require 'model/Category/Category.php';
require 'model/Category/CategoryDB.php';
require 'model/book/Book.php';
require 'model/book/BookDB.php';

require 'controller/CategoryController.php';
require 'controller/BookController.php';
require 'controller/UserController.php';

use controller\UserController;
use controller\CategoryController;
use controller\BookController;

if (!isset($_SESSION['isLogin']) || $_SESSION['role'] !== '1') {
    header("location:./listBook.php?page=login");
}
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
    <link rel="stylesheet" href="css/style.css">
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
<nav class="navbar navbar-expand-md navbar-dark bg-info sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.php"><img src="image/logo2.png" class="ml-3" style="width: 70px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-collapse dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./admin.php?page=add-category">Add Category</a>
                        <a class="dropdown-item" href="./admin.php?page=manage-category">Manage Category</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="navbar-collapse dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Books
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./admin.php?page=addBook">Add Books</a>
                        <a class="dropdown-item" href="./admin.php?page=listBook">Manage Books</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="navbar-collapse dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Scores
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/lms-demo/view/edit-profile.php">Add Score</a>
                        <a class="dropdown-item" href="./index.php?page=change-psw">Manage Score</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="navbar-collapse dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Subjects
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/lms-demo/view/edit-profile.php">Add Subject</a>
                        <a class="dropdown-item" href="./index.php?page=change-psw">Manage Subject</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav mr-5">
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                        <img src="<?php echo 'image/' . $_SESSION['avatar']; ?>" class="avatar"
                             alt="">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./admin.php?page=list-users">List Users</a>
                        <a class="dropdown-item" href="./index.php?page=edit-profile">Edit Profile</a>
                        <a class="dropdown-item" href="./index.php?page=change-psw">Change Password</a>
                        <a class="dropdown-item" href="./admin.php?page=logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <?php
    $userController = new UserController();
    $bookController = new BookController();
    $categoryController = new CategoryController();
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    switch ($page) {
        case 'login':
            $userController->login();
            break;
        case 'register':
            $userController->register();
            break;
        case 'logout':
            $userController->logout();
            break;
        case 'add-category':
            $categoryController->add();
            break;
        case 'manage-category':
            $categoryController->index();
            break;
        case 'edit-category':
            $categoryController->update();
            break;
        case'delete-category':
            $categoryController->delete();
            break;
        case 'addBook':
            $bookController->add();
            break;
        case 'deleteBook':
            $bookController->delete();
            break;
            case 'editBook':
            $bookController->edit();
            break;
        case 'list-users':
            $userController->listUsers();
            break;
        default:
            $bookController->listBook();
            break;
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
