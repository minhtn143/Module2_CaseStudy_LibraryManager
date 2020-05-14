<?php

namespace model;

use PDO;

class TicketDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($ticket)
    {
        $sql = "INSERT INTO tblborrowedbook(bookid,dateborrowed,duedate,borrowerid)
                VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $ticket->getBookId(),
            $ticket->getDateBorrow(),
            $ticket->getDueDate(),
            $ticket->getBorrowerId()
        ]);
    }

    public function listBorrowed($id)
    {
        $sql = "SELECT tblborrowedbook.ID,tblbook.booktitle,tblborrowedbook.dateborrowed,tblborrowedbook.duedate,tblborrowedbook.datereturned 
                FROM `tblborrowedbook` 
                JOIN tblbook ON tblborrowedbook.bookid = tblbook.ID 
                JOIN tblborrower ON tblborrowedbook.borrowerid = tblborrower.ID 
                WHERE tblborrower.ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $booksBorrowed = [];
        foreach ($result as $item) {
            array_push($booksBorrowed, $item);
        }
        return $booksBorrowed;
    }

}