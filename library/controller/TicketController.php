<?php


namespace controller;

use model\DBConnect;
use model\Ticket;
use model\TicketDB;

class TicketController
{
    protected $ticketDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->ticketDB = new TicketDB($db->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/ticket/addTicket.php';
        }
    }

}