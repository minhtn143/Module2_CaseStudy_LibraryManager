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


}