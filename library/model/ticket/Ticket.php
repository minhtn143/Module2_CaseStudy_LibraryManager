<?php

namespace model;


class Ticket
{
    protected $id;
    protected $bookId;
    protected $dateBorrow;
    protected $dueDate;
    protected $dateReturn;
    protected $borrowerId;

    public function __construct($bookId, $dateBorrow, $dueDate, $borrowerId)
    {
        $this->bookId = $bookId;
        $this->dateBorrow = $dateBorrow;
        $this->dueDate = $dueDate;
        $this->borrowerId = $borrowerId;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId): void
    {
        $this->bookId = $bookId;
    }

    /**
     * @param mixed $borrowerId
     */
    public function setBorrowerId($borrowerId): void
    {
        $this->borrowerId = $borrowerId;
    }

    /**
     * @param mixed $dateBorrow
     */
    public function setDateBorrow($dateBorrow): void
    {
        $this->dateBorrow = $dateBorrow;
    }

    /**
     * @param mixed $dateReturn
     */
    public function setDateReturn($dateReturn): void
    {
        $this->dateReturn = $dateReturn;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @return mixed
     */
    public function getBorrowerId()
    {
        return $this->borrowerId;
    }

    /**
     * @return mixed
     */
    public function getDateBorrow()
    {
        return $this->dateBorrow;
    }

    /**
     * @return mixed
     */
    public function getDateReturn()
    {
        return $this->dateReturn;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

}