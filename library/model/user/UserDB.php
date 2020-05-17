<?php


namespace model;

use PDO;

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
        return $this->createUserFromDB($row);
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

    public function checkStatus($id)
    {
        $sql = "SELECT status FROM tblborrower WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        $status = $result['status'];
        if ($status == 'active') {
            return true;
        } else {
            return false;
        }
    }

    public function changePsw($username, $password)
    {
        $sql = "UPDATE tblborrower SET password = ? WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$password, $username]);
    }

    public function updateProfile($data)
    {
        $sql = "UPDATE tblborrower SET fullname = :fullname, phone = :phone, address = :address, dob = :dob, gender = :gender, avatar = :avatar WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tblborrower WHERE role = 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $users = [];
        foreach ($result as $item) {
            $user = $this->createUserFromDB($item);
            array_push($users, $user);
        }
        return $users;
    }

    /**
     * @param $row
     * @return User
     */
    public function createUserFromDB($row): User
    {
        $user = new User($row['username'], $row['studentid'], $row['email'], $row['phone'], $row['password'],
            $row['avatar']);
        $user->setRole($row['role']);
        $user->setId($row['ID']);
        $user->setFullname($row['fullname']);
        $user->setAddress($row['address']);
        $user->setDob($row['dob']);
        $user->setGender($row['gender']);
        $user->setStatus($row['status']);
        return $user;
    }

    public function changeStatus($id, $status)
    {
        $sql = "UPDATE `library`.`tblborrower` SET `status` = ? WHERE (`ID` = ?);";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array($status, $id));
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM tblborrower WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $user = $stmt->fetch();
        return $this->createUserFromDB($user);
    }

    public function searchUser($keyword)
    {
        $sql = "SELECT * FROM tblborrower WHERE fullname LIKE'%$keyword%' OR username LIKE '%$keyword%' AND role = 5;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $users = [];
        foreach ($result as $item) {
            $user = $this->createUserFromDB($item);
            array_push($users, $user);
        }
        return $users;
    }

    public function count()
    {
        $sql = "SELECT ID FROM tblborrower";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_OBJ);
        return $stmt->rowCount();
    }
}