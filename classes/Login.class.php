<?php

class Login 
{
    private $username = "";
    private $password = "";
    private $email = "";
    
}
public function __construct($username, $password, $password)

{
    $this->host = getenv("DB_ADDRESS");
        $this->port = getenv("DB_PORT");
        $this->db = getenv("DB_NAME");
        $this->user = getenv("DB_USER");
        $this->pass = getenv("DB_PASSWORD");

        $this->dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db;charset=$this->charset";
        $this->options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
}