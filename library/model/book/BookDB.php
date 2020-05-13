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
        $sql = "INSERT INTO tblbook(booktitle,bookauthors,subjectid,mdescription,publisher, copyrightyear) 
                VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $newBook = [
            $book->getTitle(),
            $book->getAuthors(),
            $book->getSubjectId(),
            $book->getDescription(),
            $book->getPublisher(),
            $book->getCopyrightYear()
        ];
        return $stmt->execute($newBook);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tblbook";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $books = [];
        foreach ($result as $key => $item) {
            $book = new Book($item->getTitle(), $item->getAuthors(), $item->getSubjectId(), $item->getDescription(),
                $item->getPublisher(), $item->getCopyrightYear());
            $book->setId($item->getId());
            array_push($books, $book);
        }
        return $books;
    }
}