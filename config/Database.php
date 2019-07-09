<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $server;
    private $username;
    private $password;
    private $db_name;
    public $conn;
    
    public function __construct($url){
        $this->server = $url["host"];
        $this->username = $url["user"];
        $this->password = $url["pass"];
        $this->db_name = substr($url["path"], 1);

    }
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db_name, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
 
        return $this->conn;
    }
}
?>