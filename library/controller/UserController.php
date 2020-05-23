<?php

namespace controller;

use model\DBConnect;
use model\User;
use model\UserDB;
use model\Book;
use model\BookDB;
use model\Ticket;
use model\TicketDB;
use model\Category;
use model\CategoryDB;


class UserController
{
    protected $userDB;
    protected $bookDB;
    protected $ticketDB;
    protected $categoryDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->userDB = new UserDB($db->connect());
        $this->bookDB = new BookDB($db->connect());
        $this->categoryDB = new CategoryDB($db->connect());
        $this->ticketDB = new TicketDB($db->connect());
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
                $user = $this->userDB->get($username);
                $id = $user->getId();
                $status = $this->userDB->checkStatus($id);
                if ($status) {
                    $_SESSION['isLogin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['userID'] = $user->getId();
                    $_SESSION['avatar'] = $user->getAvatar();
                    $_SESSION['studentId'] = $user->getStudentId();
                    $_SESSION['role'] = $user->getRole();
                    switch ($_SESSION['role']) {
                        case 1:
                            echo "<script> window.location='admin.php' </script>";
                            break;
                        case 5:
                            echo "<script> window.location='index.php' </script>";
                            break;
                        default:
                            session_destroy();
                            include 'view/user/login.php';
                    }
                } else {
                    $block = '* Your account has been locked, contact with admin to unlock your account.';
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
            echo "<script>location.href='index.php?page=login';</script>";
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

    public function edit($url_return)
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
                $target_dir = "upload/";
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
            header("location:$url_return");
        }
    }

    public function listUsers()
    {
        $users = $this->userDB->getAll();
        include "view/user/list-users.php";
    }

    public function activate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $status = $this->userDB->checkStatus($id);
            if ($status == 'active') {
                $this->userDB->changeStatus('inactive', $id);
                header("location:./admin.php?page=list-users");
            } else {
                $this->userDB->changeStatus('active', $id);
                header("location:./admin.php?page=list-users");
            }
        }
    }

    public function changeStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['userId'];
            $user = $this->userDB->getUserById($id);
            switch ($user->getStatus()) {
                case "active":
                    $newStatus = "deactive";
                    break;
                case "deactive":
                    $newStatus = "active";
                    break;
            }
            $this->userDB->changeStatus($id, $newStatus);
            $this->listUsers();
        }
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $keyword = $_REQUEST['keyword'];
            $users = $this->userDB->searchUser($keyword);
            include "view/user/list-users.php";
        }
    }

    public function dashboard()
    {

        $countBooks = $this->bookDB->count();
        $countCategories = $this->categoryDB->count();
        $countReturned = $this->ticketDB->countReturned();
        $countUser = $this->userDB->count();
        $countRequest = $this->ticketDB->countRequest('available');
        include 'view/admin-dashboard.php';
    }
}
