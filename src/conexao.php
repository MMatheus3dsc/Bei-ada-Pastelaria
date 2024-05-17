<?php
/*$pdo = new PDO('mysql:host=localhost;dbname=dates_beicada', username: "root", password:"Muleta");*/


class Database {
    private $host = 'localhost';
    private $dbName = 'dates_beicada';
    private $username = 'root';
    private $password = 'Muleta';
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
