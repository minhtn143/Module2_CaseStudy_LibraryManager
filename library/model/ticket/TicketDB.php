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
        $sql = "SELECT tblborrowedbook.ID,tblbook.booktitle,tblborrowedbook.dateborrowed,tblborrowedbook.duedate,tblborrowedbook.datereturned,tblbook.ID as bookId,tblbook.booktitle,tblbook.bookauthors,tblbook.publisher,tblbook.mdescription
                FROM `tblborrowedbook` 
                RIGHT JOIN tblbook ON tblborrowedbook.bookid = tblbook.ID 
                JOIN tblborrower ON tblborrowedbook.borrowerid = tblborrower.ID 
                WHERE tblborrower.ID = ? AND tblbook.status = 'unavailable'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $booksBorrowed = [];
        foreach ($result as $item) {
            array_push($booksBorrowed, $item);
        }
        return $booksBorrowed;
    }

    public function listRequest($status)
    {
        $sql = "SELECT * FROM borrow_detail WHERE status = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$status]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $requests = [];
        foreach ($result as $item) {
            array_push($requests, $item);
        }
        return $requests;
    }

    public function deleteTicket($id)
    {
        $sql = "DELETE FROM tblborrowedbook WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function ticketDump($id)
    {
        $sql = "INSERT INTO ticket_dump SELECT * FROM tblborrowedbook WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function returnedBook($date, $id)
    {
        $sql = "UPDATE tblborrowedbook SET datereturned = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$date, $id]);
    }
}