<?php
class Database{
    private $host = "localhost";
    private $db_name = "webstore";
    private $username = "root";
    private $password = "";

    public $conn;

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

        }catch(PDOException $ex){
            echo "Connection error: " . $ex->getMessage();
        }

        return $this->conn;
    }
}
?>