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
require 'model/ticket/Ticket.php';
require 'model/ticket/TicketDB.php';

require 'controller/CategoryController.php';
require 'controller/BookController.php';
require 'controller/UserController.php';
require 'controller/TicketController.php';

use controller\UserController;
use controller\CategoryController;
use controller\BookController;
use controller\TicketController;

if (!isset($_SESSION['isLogin']) || $_SESSION['role'] !== '1') {
    header("location:./index.php?page=login");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <!--        BRAND LOGO-->
                <a class="navbar-brand" href="admin.php"><i class="fas fa-school fa-3x"><span style="font-size: 30px"> Library Management System</span></i></a>
                <!--            TOGGLE-BUTTON-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto mr-2">
                        <li class="navbar-collapse">
                            <a href="admin.php" class="nav-link active"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li class="navbar-collapse dropdown">
                            <a class="nav-link dropdown-toggle" href="./admin.php?page=manage-category" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-list"></i>Category
                            </a>
                            <div class="dropdown-menu sub-menu-test" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="./admin.php?page=add-category">Add Category</a>
                                <a class="dropdown-item" href="./admin.php?page=manage-category">Manage Category</a>
                            </div>
                        </li>
                        <li class="navbar-collapse dropdown">
                            <a class="nav-link dropdown-toggle" href="./admin.php?page=listBook" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-book"></i>Books
                            </a>
                            <div class="dropdown-menu sub-menu-test" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="./admin.php?page=addBook">Add Books</a>
                                <a class="dropdown-item" href="./admin.php?page=listBook">Manage Books</a>
                            </div>
                        </li>
                        <li class="navbar-collapse dropdown">
                            <a class="nav-link dropdown-toggle" href="./admin.php?page=request" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-tasks"></i>Borrow
                            </a>
                            <div class="dropdown-menu sub-menu-test" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="./admin.php?page=request">Manage request</a>
                                <a class="dropdown-item" href="./admin.php?page=return-book">Manage borrowed books</a>
                                <a class="dropdown-item" href="./admin.php?page=history">Borrow history</a>
                            </div>
                        </li>
                        <li class="navbar-collapse dropdown">
                            <a class="nav-link" href="./admin.php?page=list-users"><i class="fa fa-users"></i>List Students</a>
                        </li>
                        <li class="navbar-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i><?php echo $_SESSION['username']; ?>
                                <img src="<?php echo 'upload/' . $_SESSION['avatar']; ?>" class="avatar" alt="">
                            </a>
                            <div class="dropdown-menu sub-menu-test" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="./admin.php?page=edit-profile">Edit Profile</a>
                                <a class="dropdown-item" href="./admin.php?page=change-psw">Change Password</a>
                                <a class="dropdown-item" href="./admin.php?page=logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="main">
        <?php
        $userController = new UserController();
        $bookController = new BookController();
        $categoryController = new CategoryController();
        $ticketController = new TicketController();
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
        switch ($page) {
            case 'edit-profile':
                $userController->edit('admin.php');
                break;
            case 'change-psw':
                $userController->changePsw();
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
            case 'delete-category':
                $categoryController->delete();
                break;
            case 'searchCategory':
                $categoryController->search();
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
            case 'searchBook':
                $bookController->search();
                break;
            case 'list-users':
                $userController->listUsers();
                break;
            case 'searchUser':
                $userController->search();
                break;
            case 'changeStatus':
                $userController->changeStatus();
                break;
            case 'request':
                $ticketController->acceptRequest();
                break;
            case 'return-book':
                $ticketController->returnBook();
                break;
            case 'listBook':
                $bookController->listBook();
                break;
            case 'history':
                $ticketController->storageHistory();
                break;
            default:
                $userController->dashboard();
                break;
        }
        ?>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>