<?php

class Reservation {
    private $conn;
    private $table_name="reservations";
 
    private $id;
    private $userId;

    private $date;
    private $time;
    private $people;

    public function __construct($db){
        $this->conn = $db;
    }

    public function createTable(&$tableInfo){
        $this->userId = $tableInfo->userId;
        $this->date   = $tableInfo->picked_date;
        $this->time   = $tableInfo->picked_time;
        $this->people = $tableInfo->picked_people; 

        

        // insert query
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    userid = :userid,
                    date = :date,
                    time = :time,
                    people = :people";
    
        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->userId=htmlspecialchars(strip_tags($this->userId));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->people=htmlspecialchars(strip_tags($this->people));
    
        // bind the values
        $stmt->bindParam(':userid', $this->userId);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':people', $this->people);
    
        
    
        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }
    }

    public function getTable($id){




        return $data;
    }

    public function getMonthlyData(){
        //query : count all reservation by monthly from current month  for 1 year
        $query = "SELECT YEAR(date) AS yr
                                , MONTH(date) AS mth
                                , DATE_FORMAT(date,'%M %Y') AS display_date
                                , COUNT(*) AS total
                            FROM reservations 
                            WHERE date >= CURRENT_DATE - INTERVAL 1 YEAR
                            GROUP
                            BY yr,mth
                            ORDER
                            BY yr ASC, mth ASC"
                            ; 
        
        $stmt = $this->conn->prepare($query);
        
        //run query
        if($stmt->execute()){

            //reurn result
            return $stmt->fetchAll();
        };
        return false;
        

    }

    public function getWeeklyData($date){
        //query : coun all reserved seat of current week

    }
}

?>