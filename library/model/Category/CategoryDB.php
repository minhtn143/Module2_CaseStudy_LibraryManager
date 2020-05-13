<?php


namespace model;

use PDO;

class CategoryDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($category)
    {
        $sql = "INSERT INTO tblsubject(subjectname,description)
                VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $category->getName(),
            $category->getDescription()
        ]);
    }

    public function checkCategoryName($categoryName)
    {
        $sql = "SELECT subjectname FROM tblsubject WHERE subjectname = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $categoryName);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tblsubject";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $categories = [];
        foreach ($result as $value) {
            $category = new  Category($value['subjectname'], $value['description']);
            $category->setId($value['ID']);
            array_push($categories,$category);
        }
        return $categories;
    }
}