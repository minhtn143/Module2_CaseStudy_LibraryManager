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
        }
    }
}