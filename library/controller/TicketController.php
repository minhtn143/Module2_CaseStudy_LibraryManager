<?php


namespace controller;

use model\DBConnect;
use model\Ticket;
use model\TicketDB;
use model\Book;
use model\BookDB;

class TicketController
{
    protected $ticketDB;
    protected $bookDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->ticketDB = new TicketDB($db->connect());
        $this->bookDB = new BookDB($db->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $books = $this->bookDB->getAllAvailable('available');
            include 'view/borrow/user-borrow/borrowBook.php';
        } else {
            $bookId = $_REQUEST['checkList'];

            for ($i = 0; $i < count($bookId); $i++) {
                $borrowerId = $_POST['borrowerId'];
                $borrowDate = date('Y-m-d');
                $dueDate = date('Y-m-d', strtotime(' + 30 days'));
                $ticket = new Ticket((int)$bookId[$i], $borrowDate, $dueDate, (int)$borrowerId);
                $this->ticketDB->create($ticket);
            }
            $success = 'success';
            $books = $this->bookDB->getAll();
            include 'view/borrow/user-borrow/borrowBook.php';
        }
    }

    public function listBorrowed()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $listBooks = $this->ticketDB->listBorrowed($_SESSION['userID']);
            include 'view/borrow/user-borrow/borrowed.php';
        }
    }

    public function acceptRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $listRequests = $this->ticketDB->listRequest('available');
            include 'view/borrow/admin-borrow/request.php';
        } else {
            $bookId = $_REQUEST['checkList'];
            for ($i = 0; $i < count($bookId); $i++) {
                $this->bookDB->changeStatus($bookId[$i], 'unavailable');
            }
            $listRequests = $this->ticketDB->listRequest('available');
            include 'view/borrow/admin-borrow/request.php';
        }
    }

    public function returnBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $returnBooks = $this->ticketDB->listRequest('unavailable');
            include 'view/borrow/admin-borrow/returnBook.php';
        } else {
            $ticketId = $_REQUEST['ticketId'];
            $bookId = $_REQUEST['checkList'];
            $date = date('Y-m-d');
            for ($i = 0; $i < count($bookId); $i++) {
                $date = date('Y-m-d');
                $this->ticketDB->returnBook($date, $ticketId[$i]);
                $this->ticketDB->ticketDump($ticketId[$i]);
                $this->bookDB->changeStatus($bookId[$i], 'available');
                $this->ticketDB->deleteTicket($ticketId[$i]);
            }
            $returnBooks = $this->ticketDB->listRequest('unavailable');
            include 'view/borrow/admin-borrow/returnBook.php';
        }
    }

    public function userReturned()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $userReturned = $this->ticketDB->returnedByBorrowerId($_SESSION['userID']);
            include 'view/borrow/user-borrow/returned.php';
        }
    }

    public function storageHistory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $returnedBooks = $this->ticketDB->allReturned();
            include 'view/borrow/admin-borrow/borrowHistory.php';
        }
    }
}