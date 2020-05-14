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
            $book = new Book($item['booktitle'], $item['bookauthors'], $item['subjectid'], $item['mdescription'],
                $item['publisher'], $item['copyrightyear']);
            $book->setId($item['ID']);
            array_push($books, $book);
        }
        return $books;
    }

    public function getBookById($id)
    {
        $sql = "SELECT * FROM tblbook WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        $book = new Book($result['booktitle'], $result['bookauthors'], $result['subjectid'], $result['mdescription'],
            $result['publisher'], $result['copyrightyear']);
        $book->setId($id);
        return $book;
    }

    public function deleteBook($id)
    {
        $sql = "DELETE FROM tblbook WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}