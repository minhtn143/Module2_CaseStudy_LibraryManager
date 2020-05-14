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

    public function __construct($bookId,$dateBorrow,$dueDate,$dateReturn,$borrowerId)
    {
        $this->bookId = $bookId;
    }
}