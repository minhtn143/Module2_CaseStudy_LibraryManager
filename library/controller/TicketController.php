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
            $books = $this->bookDB->getAll();
            include 'view/borrow/borrowBook.php';
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
            include 'view/borrow/borrowBook.php';
        }
    }

    public function listBorrowed()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $listBooks = $this->ticketDB->listBorrowed($_SESSION['userID']);
            include 'view/borrow/borrowed.php';
        }
    }

    public function acceptRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $listRequests = $this->ticketDB->listRequest('available');
            include 'view/admin-borrow/request.php';
        } else {
            $bookId = $_REQUEST['checkList'];
            for ($i = 0; $i < count($bookId); $i++) {
                $this->bookDB->changeStatus($bookId[$i], 'unavailable');
            }
            $listRequests = $this->ticketDB->listRequest('available');
            include 'view/admin-borrow/request.php';
        }
    }

    public function returnBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $returnBooks = $this->ticketDB->listRequest('unavailable');
            include 'view/admin-borrow/returnBook.php';
        } else {
            $ticketId = $_REQUEST['ticketId'];
            $bookId = $_REQUEST['checkList'];
            for ($i = 0; $i < count($bookId); $i++) {
                $this->bookDB->changeStatus($bookId[$i], 'available');
                $this->ticketDB->deleteTicket($ticketId[$i]);
            }
            $returnBooks = $this->ticketDB->listRequest('unavailable');
            include 'view/admin-borrow/returnBook.php';
        }
    }
}