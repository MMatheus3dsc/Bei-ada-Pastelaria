<?php



class Database {   private $host = 'localhost';
    private $port = '3306';
    private $dbName = 'dates_beicada';
    private $username = 'root';
    private $password = 'muleta';
    public $conn;

    public function getConnection(): PDO {
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

