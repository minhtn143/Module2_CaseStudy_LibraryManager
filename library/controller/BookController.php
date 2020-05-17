<?php


namespace controller;

const DEFAULT_COVER = "book-cover-default.png";

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
        $category = $this->categoryDB->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/book/addBook.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $book = $this->createBookFromDB();

            if ($this->isDuplicate($book)) {
                $errDuplicate = "Book has been library!";
                include 'view/book/addBook.php';
            } else {
                if (isset($_FILES)) {
                    $target_dir = "image/book-cover/";
                    $cover_name = time() . '-' . $_FILES['cover']['name'];
                    $target_file = $target_dir . $cover_name;
                    move_uploaded_file($_FILES['cover']['tmp_name'], $target_file);
                    $book->setCover($cover_name);
                }
                $this->bookDB->add($book);
                $success = true;
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
            $book = $this->bookDB->getBookById($id);

            $target_dir = "image/book-cover/";
            $cover_name = $book->getCover();
            $target_file = $target_dir . $cover_name;

            if ($cover_name != DEFAULT_COVER) {
                unlink($target_file);
            }

            $this->bookDB->deleteBook($id);
            $books = $this->bookDB->getAll();
            echo "<script>location.href='./admin.php?page=listBook';</script>";
        }
    }

    public function edit()
    {
        $id = $_REQUEST['bookId'];
        $categories = $this->categoryDB->getAll();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $book = $this->bookDB->getBookById($id);
            include "view/book/editBook.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $book = $this->createBookFromDB();

            if (isset($_FILES)) {

                $target_dir = "image/book-cover/";
                //kiem tra file gui len khac null

                if (!empty($_FILES['cover']['name'])) {
                    //kiem tra old cover co khac Default ko, neu khac thi xoa img
                    $oldCover = $book->getCover();
                    if ($oldCover != DEFAULT_COVER) {
                        $target_file = $target_dir . $oldCover;
                        unlink($target_file);
                        $cover_name = time() . '-' . $_FILES['cover']['name'];
                        $target_file = $target_dir . $cover_name;
                        move_uploaded_file($_FILES['cover']['tmp_name'], $target_file);
                        $book->setCover($cover_name);
                    }
                    //dat file anh moi
                    $cover_name = time() . '-' . $_FILES['cover']['name'];
                    $target_file = $target_dir . $cover_name;
                    move_uploaded_file($_FILES['cover']['tmp_name'], $target_file);
                    $book->setCover($cover_name);
                }
            }

            $book->setId($_REQUEST['bookId']);
            $this->bookDB->editBook($id, $book);
            $success = ($this->bookDB->editBook($id, $book)) ? true : false;
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

    public function count()
    {
        $countBooks = $this->bookDB->count();
        include 'view/admin-dashboard.php';
    }

}