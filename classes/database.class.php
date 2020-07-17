<?php

class Database
{
    private $serverName;
    private $username;
    private $password;
    private $databaseName;
    private $charset;

    public function __construct($databaseName)
    {
        $this->serverName = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->databaseName = $databaseName;
        $this->charset = "utf8mb4";
    }

    protected function connect()
    {
        try {
            $DSN = "mysql:host=" . $this->serverName . ";dbname=" . $this->databaseName . ";charset=" . $this->charset;
            $PDO = new PDO($DSN, $this->username, $this->password);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
