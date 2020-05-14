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
        $user->setFullname($row['fullname']);
        $user->setAddress($row['address']);
        $user->setDob($row['dob']);
        $user->setGender($row['gender']);
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

    public function checkStatus($username)
    {
        $sql = "SELECT status FROM tblborrower WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        $status = $result['status'];
        if ($status == 'active') {
            return true;
        } else
            return false;
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

    public function listUsers()
    {
        $sql = "SELECT * FROM tblborrowed";
        $stmt = $this->userDB->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $users = [];
        foreach ($result as $item) {
            $user = new  User($item->getUserNam(), $item->getStudentId(), $item->getEmail(), $item->getPhone(),
                $item->getPassword(), $item->getAvatar());
            $user->setId($item->getId());
            $user->setFullname($item->getFullName());
            $user->setAddress($item->getAddress());
            $user->setDob($item->getDob());
            $user->setGender($item->getGender());
            $user->setRole($item->getRole());
            $user->setStatus($item->getStatus());
            array_push($users, $user);
        }
        return $users;
    }
}