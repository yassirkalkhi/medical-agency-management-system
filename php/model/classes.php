<?php

class Db {

    public function __construct($database) {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = $database;
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($query,$params) {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function getLastId(){
        return $this->pdo->lastInsertId();
    }
    public function __destruct() {
        $this->pdo = null;
    }
}

?>
