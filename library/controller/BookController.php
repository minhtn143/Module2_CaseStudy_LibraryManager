<?php


namespace controller;


use model\BookDB;
use model\CategoryDB;
use model\DBConnect;
use model\Book;
use model\Category;

class BookController
{
    protected $bookDB;
    protected $categoryDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->bookDB = new BookDB($db->connect());
        $this->categoryDB = new CategoryDB($db->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $category = $this->categoryDB->getAll();
            include 'view/book/addBook.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $book = $this->createBookFromDB();
            if ($this->isDuplicate($book)) {
                $errDuplicate = "Book has been library!";
                include 'view/book/addBook.php';
            } else {
                $success = true;
                $this->bookDB->add($book);
                include 'view/book/addBook.php';
            }

        }
    }

    public function isDuplicate($book)
    {
        $books = $this->bookDB->getAll();
        foreach ($books as $item) {
            if ($book->getTitle() == $item->getTitle() && $book->getAuthors() == $item->getAuthors()) {
                return true;
            }
        }
        return false;
    }

    public function listBook()
    {
        $books = $this->bookDB->getAll();
        $categories = $this->categoryDB->getAll();
        include "view/book/listBook.php";
    }

    public function delete()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_REQUEST['bookId'];
            $this->bookDB->deleteBook($id);
            $book = $this->bookDB->getAll();
            header("location:./admin.php?page=listBook");
        }
    }

    public function edit()
    {
        $id= $_REQUEST['bookId'];
        $category = $this->categoryDB->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $book = $this->bookDB->getBookById($id);
            include "view/book/editBook.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $book = $this->createBookFromDB();
            $book->setId($_REQUEST['bookId']);
                $this->bookDB->editBook($id,$book);
                $success = ($this->bookDB->editBook($id,$book)) ? true:false;
                include 'view/book/editBook.php';
            }
        }


    /**
     * @return Book
     */
    public function createBookFromDB(): Book
    {
        $title = $_REQUEST['booktitle'];
        $author = $_REQUEST['author'];
        $subjectId = $_REQUEST['subjectId'];
        $publisher = $_REQUEST['publisher'];
        $description = $_REQUEST['description'];
        $copyrightYear = $_REQUEST['copyrightYear'];

        return new Book($title, $author, $subjectId, $description, $publisher, $copyrightYear);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $keyword = $_REQUEST['keyword'];
            $books = $this->bookDB->searchBook($keyword);
            include "view/book/listBook.php";
        }
    }

}