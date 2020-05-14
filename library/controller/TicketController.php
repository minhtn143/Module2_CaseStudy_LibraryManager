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
            include 'view/ticket/addTicket.php';
        } else {
            $bookId = $_REQUEST['checkList'];
//            var_dump($bookId);

            for ($i = 0; $i < count($bookId); $i++) {
                $borrowerId = $_POST['borrowerId'];
                $borrowDate = date('Y-m-d');
                $dueDate = date('Y-m-d', strtotime(' + 30 days'));
                $ticket = new Ticket((int)$bookId[$i], $borrowDate, $dueDate, (int)$borrowerId);
                $this->ticketDB->create($ticket);
            }
            $success = 'success';
            $books = $this->bookDB->getAll();
            include 'view/ticket/addTicket.php';
        }
    }

}