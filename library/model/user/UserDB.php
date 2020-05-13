<?php


namespace model;


class UserDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function userLogin($username, $password)
    {
        $sql = "SELECT * FROM tblborrower WHERE username = '$username' AND password = '$password'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'password' => $password
        ]);
        $count = $stmt->rowCount();
        if ($count) {
            return true;
        } else {
            return false;
        }
    }

    public function get($username)
    {
        $sql = "SELECT * FROM tblborrower WHERE username = '$username'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch();
        $user = new User($row['username'], $row['studentid'], $row['email'], $row['phone'], $row['password'], $row['avatar']);
        $user->setRole($row['role']);
        $user->setId($row['ID']);
        return $user;
    }

    public function create($borrower)
    {
        $sql = "INSERT INTO tblborrower(username, studentid, email, phone, password)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $borrower->getUsername(),
            $borrower->getStudentId(),
            $borrower->getEmail(),
            $borrower->getPhone(),
            $borrower->getPassword(),
        ]);
    }

    public function checkUsername($username)
    {
        $sql = "SELECT username FROM tblborrower WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function checkEmail($email)
    {
        $sql = "SELECT username FROM tblborrower WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function checkStudentId($studentId)
    {
        $sql = "SELECT username FROM tblborrower WHERE studentid = :studentId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":studentId", $studentId);
        $stmt->execute();
        return $stmt->fetch();
    }

}