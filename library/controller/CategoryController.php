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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $category = new Category($_POST['category'], $_POST['description']);
            $this->categoryDB->update($id, $category);
            $categories = $this->categoryDB->getAll();
            $updateComplete = true;
            include 'view/category/list.php';
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $id = $_GET['id'];
            $this->categoryDB->delete($id);
            $categories = $this->categoryDB->getAll();
            echo "<script>location.href='admin.php?page=manage-category';</script>";
//            header("location:./admin.php?page=manage-category");
        }
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $keyword = $_REQUEST['keyword'];
            $categories = $this->categoryDB->searchCategory($keyword);
            include "view/category/list.php";
        }
    }

    public function count()
    {
        $categories = $this->categoryDB->count();
        include 'view/admin-dashboard.php';
    }
}