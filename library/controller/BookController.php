<?php


namespace controller;


use model\BookDB;
use model\DBConnect;

class BookController
{
    protected $bookDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->bookDB = new BookDB($db->connect());
    }

    public function add()
    {

    }
}