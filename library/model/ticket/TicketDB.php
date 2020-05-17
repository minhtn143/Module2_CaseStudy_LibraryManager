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

    public function returnBook($date, $id)
    {
        $sql = "UPDATE tblborrowedbook SET datereturned = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$date, $id]);
    }

    public function allReturned()
    {
        $sql = "SELECT * FROM history_borrow";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $history = [];
        foreach ($result as $item) {
            array_push($history, $item);
        }
        return $history;
    }

    public function returnedByBorrowerId($id)
    {
        $sql = "SELECT * FROM history_borrow WHERE borrowerid = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $history = [];
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $item) {
            array_push($history, $item);
        }
        return $history;
    }

    public function countReturned()
    {
        $sql = "SELECT ID FROM ticket_dump";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_OBJ);
        return $stmt->rowCount();
    }

    public function countRequest($status)
    {
        $sql = "SELECT * FROM borrow_detail WHERE status = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$status]);
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt->rowCount();
    }
}