<?php

class Accounts extends Database
{
    public function __construct()
    {
        parent::__construct("accounts");
    }

    protected function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE user_email=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function setUser($firstname, $lastname, $email, $password)
    {
        $sql = "INSERT INTO users(user_first, user_last, user_email, user_password) VALUES(?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$firstname, $lastname, $email, $password]);
    }
}
