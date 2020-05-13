<?php

namespace controller;

use model\DBConnect;
use model\User;
use model\UserDB;

class UserController
{
    protected $userDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->userDB = new UserDB($db->connect());
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/user/login.php';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $isLogin = $this->userDB->userLogin($username, $password);
            if ($isLogin) {
                $_SESSION['isLogin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $user = $this->userDB->get($username);
                $_SESSION['avatar'] = $user->getAvatar();
                $_SESSION['studentId'] = $user->getStudentId();
                $_SESSION['role'] = $user->getRole();
                switch ($_SESSION['role']) {
                    case 1:
                        header("location:admin.php");
                        break;
                    case 5:
                        header("location:index.php");
                        break;
                    default:
                        session_destroy();
                        include 'view/user/login.php';
                }
            } else {
                $errLogin = '* Incorrect username or password.';
                include 'view/user/login.php';
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/user/register.php';
        }
    }
}
