<?php

class Register
{
    private $pdo;
    private $username;
    private $password;
    private $email;

    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;

        require_once __DIR__ . '/../vendor/autoload.php';

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this->host = getenv("DB_ADDRESS");
        $this->port = getenv("DB_PORT");
        $this->db = getenv("DB_NAME");
        $this->user = getenv("DB_USER");
        $this->pass = getenv("DB_PASSWORD");
        $this->charset = 'utf8mb4';

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
        
        $this->hashPassword($password);
        $this->checkIfUserExists($email);
    }

    public function checkIfUserExists($email)
    {
        $stmt = $this->pdo->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $_SESSION["signup"] = "Username already exists :(" ;
        } else {
            $this->newUser($this->username, $this->password, $this->email);
            $_SESSION["signup"] = "Sign up sucess! You can now login";
        }
    }

    public function hashPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function newUser($username, $password, $email)
    {
        $stmt = $this->pdo->prepare("INSERT into users (username, password, email) 
        VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);
    }
}
