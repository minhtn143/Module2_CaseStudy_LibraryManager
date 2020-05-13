<?php


namespace controller;


use model\BookDB;
use model\DBConnect;
use model\Book;

class BookController
{
    protected $bookDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->bookDB = new BookDB($db->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/book/addBook.php';
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_REQUEST['booktitle'];
            $author = $_REQUEST['author'];
            $subjectId = $_REQUEST['subjectId'];
            $publisher = $_REQUEST['publisher'];
            $description = $_REQUEST['description'];
            $copyrightYear = $_REQUEST['copyrightYear'];

            $book = new Book($title,$author,$subjectId,$publisher,$description,$copyrightYear);

            if ($this->isDuplicate($book)){
                $errDuplicate = "Book has been library!";
                include "library\index.php";
            }else{
                $this->bookDB->add($book);
                var_dump($this->bookDB->getAll());
                die();
                header("location:index.php");
            }

        }
    }

    public function isDuplicate($book)
    {
        $books = $this->bookDB->getAll();
        foreach ($books as $item) {
            if ($book->getTitle() == $item->getTitle() && $book->getAuthors() == $item->getAuthors()){
                return true;
            }
        }
        return false;
    }
}