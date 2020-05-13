<?php

namespace model;

class BookDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function add($book)
    {
        $sql = "INSERT INTO tblbook('booktitle','bookauthors','subjectid','mdescription','publisher', 'copyrightyear') 
                VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $book->getTitle());
        $stmt->bindParam(2, $book->getAuthors());
        $stmt->bindParam(3, $book->getSubjectId());
        $stmt->bindParam(4, $book->getDescription());
        $stmt->bindParam(5, $book->getPublisher());
        $stmt->bindParam(6, $book->getCopyrightYear());
        $stmt->exexcute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tblbook";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute();
        $books = [];
        foreach ($result as $item) {
            $book = new Book($item->getTitle(), $item->getAuthors(), $item->getSubjectId(), $item->getDescription(),
                $item->getPublisher(), $item->getCopyrightYear());
            $book->setId($item->getId());
            array_push($books,$book);
        }
        return $books;
    }
}