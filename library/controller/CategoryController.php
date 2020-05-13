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
}