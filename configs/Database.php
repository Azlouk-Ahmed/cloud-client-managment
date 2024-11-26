<?php
class Database {
    private $host = "tcp:mini-projet.database.windows.net,1433"; 
    private $db_name = "societe"; 
    private $username = "ahmed"; 
    private $password = "azerty123@"; 
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            
            $this->conn = new PDO(
                "sqlsrv:server=" . $this->host . ";Database=" . $this->db_name . ";Encrypt=true;TrustServerCertificate=false",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection successful!";
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            die();
        }
        return $this->conn;
    }
}
?>
