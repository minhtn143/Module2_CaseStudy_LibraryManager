<?php
session_start();

require 'config.php';
require "model/database/DBConnect.php";
require 'model/user/User.php';
require 'model/user/UserDB.php';
require 'controller/UserController.php';
require 'model/Category/Category.php';
require 'model/Category/CategoryDB.php';
require 'controller/CategoryController.php';

use controller\UserController;
use controller\CategoryController;

if (!isset($_SESSION['isLogin']) || $_SESSION['role'] !== '1') {
    header("location:./index.php?page=login");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        Students
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/lms-demo/view/edit-profile.php">Add Student</a>
                        <a class="dropdown-item" href="./index.php?page=change-psw">Manage Student</a>
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
    }

    ?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
