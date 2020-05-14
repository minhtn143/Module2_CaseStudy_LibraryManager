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

            $status = $this->userDB->checkStatus($username);
            $isLogin = $this->userDB->userLogin($username, $password);
            if ($isLogin && $status) {
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
            } elseif (!$isLogin) {
                $errLogin = '* Incorrect username or password.';
                include 'view/user/login.php';
            } else {
                $block = '* Your account has been locked, contact with admin to unlock the account.';
                include 'view/user/login.php';
            }
        }
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            session_destroy();
            header("location:index.php?page=login");
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

    public function changePsw()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/user/change-psw.php';
        } else {
            $cur_psw = $_REQUEST['cur_psw'];
            $new_psw = $_REQUEST['new_psw'];
            $re_psw = $_REQUEST['re_psw'];

            if ($cur_psw !== $_SESSION['password']) {
                $errChange = '* Wrong current password.';
                include 'view/user/change-psw.php';
            } else {
                $username = $_SESSION['username'];
                $this->userDB->changePsw($username, $new_psw);
                $success = true;
                session_destroy();
                include 'view/user/change-psw.php';
            }
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $user = $this->userDB->get($_SESSION['username']);
            include 'view/user/edit-profile.php';
        } else {
            $username = $_SESSION['username'];
            $fullName = $_POST['fullName'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $avatar = $_FILES['avatar']['name'];
            $data = [
                'fullname' => $fullName,
                'phone' => $phone,
                'address' => $address,
                'dob' => $dob,
                'gender' => $gender,
                'avatar' => $_SESSION['avatar'],
                'username' => $username
            ];

            $user = $this->userDB->get($_SESSION['username']);
            $cur_avatar = $user->getAvatar();
            if (!empty($avatar)) {
                $target_dir = "image/";
                if ($cur_avatar !== 'default.png') {
                    $avatar_del = $target_dir . $cur_avatar;
                    unlink($avatar_del);
                    $avatar_name = basename(time() . '_' . $avatar);
                    $target_file = $target_dir . $avatar_name;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                    $data['avatar'] = $avatar_name;
                    $_SESSION['avatar'] = $avatar_name;
                } else {
                    $avatar_name = basename(time() . '_' . $avatar);
                    $target_file = $target_dir . $avatar_name;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                    $data['avatar'] = $avatar_name;
                    $_SESSION['avatar'] = $avatar_name;
                }
            }
            $this->userDB->updateProfile($data);
            header("location:index.php");
        }
    }
}
