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

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            session_destroy();
            header("location:index.php");
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/user/register.php';
        } else {
            $username = $_POST['username'];
            $studentId = $_POST['studentId'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $re_psw = $_POST['re_psw'];

            $checkId = $this->userDB->checkStudentId($studentId);
            $checkUser = $this->userDB->checkUsername($username);
            $checkEmail = $this->userDB->checkEmail($email);
            $isError = false;

            if ($checkId) {
                $isError = true;
                $existId = '* Student ID already exist.';
            }

            if ($checkUser) {
                $isError = true;
                $existUser = '* Username already exist.';
            }

            if ($checkEmail) {
                $isError = true;
                $existEmail = '* Email already exist.';
            }

            if ($isError) {
                include 'view/user/register.php';
            } else {
                $user = new User($username, $studentId, $email, $phone, $password);
                $this->userDB->create($user);
                $success = "Created";
                include 'view/user/register.php';
            }
        }
    }
}
