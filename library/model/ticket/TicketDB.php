<?php

namespace model;


class TicketDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($ticket)
    {
        $sql = "INSERT INTO tblborrowedbook(bookid,dateborrowed,duedate,datereturned,borrowerid)
                VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $ticket->getBookId(),
            $ticket->getDateBorrow(),
            $ticket->getDueDate(),
            $ticket->getDateReturn(),
            $ticket->getBorrowerId()
        ]);
    }
}