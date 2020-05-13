<?php


namespace controller;


use model\DBConnect;
use model\Category;
use model\CategoryDB;

class CategoryController
{
    protected $categoryDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->categoryDB = new CategoryDB($db->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/category/add.php';
        } else {

            $categoryName = $_POST['category'];
            $description = $_POST['description'];

            $checkName = $this->categoryDB->checkCategoryName($categoryName);
            if ($checkName) {
                $nameExist = "* Category already exist.";
                include 'view/category/add.php';
            } else {
                $category = new Category($categoryName, $description);
                $this->categoryDB->create($category);
                $success = true;
                include 'view/category/add.php';
            }
        }
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categories = $this->categoryDB->getAll();
            include 'view/category/list.php';
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->get($id);
            include 'view/category/edit.php';
        } else {
            $checkName = $this->categoryDB->checkCategoryName($_POST['category']);
            if ($checkName) {
                $_SESSION['nameExist'] = "* Category already exist.";
                echo "<script>window.history.back()</script>";
            } else {
                $id = $_POST['id'];
                $category = new Category($_POST['category'], $_POST['description']);
                $this->categoryDB->update($id, $category);
                unset($_SESSION['nameExist']);
                $updateComplete = true;
                include 'view/category/edit.php';
            }
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $id = $_GET['id'];
            $this->categoryDB->delete($id);
            $categories = $this->categoryDB->getAll();
            header("location:./admin.php?page=manage-category");
        }
    }
}