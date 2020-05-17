<?php

namespace model;

use PDO;

class BookDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function add($book)
    {
        $sql = "INSERT INTO tblbook(booktitle,bookauthors,subjectid,mdescription,publisher,copyrightyear,cover) 
                VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $newBook = [
            $book->getTitle(),
            $book->getAuthors(),
            (int)$book->getSubjectId(),
            $book->getDescription(),
            $book->getPublisher(),
            (int)$book->getCopyrightYear(),
            $book->getCover()
        ];
        $stmt->execute($newBook);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tblbook";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $this->createBooksFromDB($result);
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
        $book->setCover($result['cover']);
        return $book;
    }

    public function deleteBook($id)
    {
        $sql = "DELETE FROM tblbook WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

    public function editBook($id, $book)
    {
        $sql = "UPDATE tblbook SET booktitle = ?, bookauthors = ?, subjectid = ?, 
                mdescription = ?, publisher = ?, copyrightyear = ? , cover = ? WHERE (ID = $id)";
        $stmt = $this->conn->prepare($sql);

        $title = $book->getTitle();
        $author = $book->getAuthors();
        $subjectId = $book->getSubjectId();
        $description = $book->getDescription();
        $publisher = $book->getPublisher();
        $copyrightYear = $book->getCopyrightYear();
        $cover = $book->getCover();

        return $stmt->execute(array($title, $author, $subjectId, $description, $publisher, $copyrightYear,$cover));
    }

    public function searchBook($keyword)
    {
        $sql = "SELECT * FROM tblbook WHERE booktitle LIKE '%$keyword%' OR bookauthors LIKE '%$keyword%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $this->createBooksFromDB($result);
    }

    /**
     * @param $result
     * @return array
     */
    public function createBooksFromDB($result): array
    {
        $books = [];
        foreach ($result as $key => $item) {
            $book = new Book($item['booktitle'], $item['bookauthors'], $item['subjectid'], $item['mdescription'],
                $item['publisher'], $item['copyrightyear']);
            $book->setId($item['ID']);
            $book->setCover($item['cover']);
            array_push($books, $book);
        }
        return $books;
    }

    public function changeStatus($id, $status)
    {
        $sql = "UPDATE tblbook SET status = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$status, $id]);
    }

    public function count()
    {
        $sql = "SELECT ID FROM tblbook";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_OBJ);
        return $stmt->rowCount();
    }


    public function getAllAvailable($status)
    {
        $sql = "SELECT * FROM tblbook WHERE status = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$status]);
        $result = $stmt->fetchAll();

        return $this->createBooksFromDB($result);
    }
}