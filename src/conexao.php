<?php


/*class Database {
    private $host = 'localhost';
    private $port = '3306';
    private $dbName = 'dates_beicada';
    private $username = 'root';
    private $password = '123muleta';
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbName}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}*/

class Database {   private $host = 'localhost';
    private $port = '3306';
    private $dbName = 'dates_beicada';
    private $username = 'root';
    private $password = '123muleta';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->dbName}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>

