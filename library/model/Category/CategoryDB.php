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
        $sql = "INSERT INTO tblsubject(subjectname,desrciption)
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
}