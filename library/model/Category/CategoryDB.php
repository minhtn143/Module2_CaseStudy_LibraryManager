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
        return $this->createCategoryFromDB($result);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM tblsubject WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $category = new Category($row['subjectname'], $row['description']);
        $category->setId($row['ID']);
        return $category;
    }

    public function update($id, $category)
    {
        $sql = "UPDATE tblsubject SET subjectname = ?, description = ? WHERE id= ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$category->getName(), $category->getDescription(), $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tblsubject WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    /**
     * @param $result
     * @return array
     */
    public function createCategoryFromDB($result): array
    {
        $categories = [];
        foreach ($result as $value) {
            $category = new  Category($value['subjectname'], $value['description']);
            $category->setId($value['ID']);
            array_push($categories, $category);
        }
        return $categories;
    }

    public function searchCategory($keyword)
    {
        $sql = "SELECT * FROM tblsubject WHERE subjectname LIKE'%$keyword%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $this->createCategoryFromDB($result);
    }

    public function count()
    {
        $sql = "SELECT * FROM tblsubject";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_OBJ);
        return $stmt->rowCount();
    }
}