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

    public function getCurrentData($select,$dateSelected=null){
        if($select === 'month'){
            //query : count all reservation by monthly from current month -+ 6 months
            $query = "set @date_start := (SELECT CURDATE() - INTERVAL 6 MONTH), 
            @date_end := (SELECT CURDATE() + INTERVAL 6 MONTH), 
            @i := 0;";
    
            $query2 ="SELECT EXTRACT(YEAR_MONTH FROM ADDDATE(@date_start, INTERVAL @i:=@i+ 1 MONTH)) AS date1, IFNULL((
                SELECT COUNT(*) FROM reservations AS m2
                WHERE EXTRACT(YEAR_MONTH FROM m2.date) = EXTRACT(YEAR_MONTH FROM ADDDATE(@date_start, INTERVAL @i MONTH))
            ),0) AS total
            , DATE_FORMAT(ADDDATE(@date_start, INTERVAL @i:=@i+ 0 MONTH), '%Y %M') AS display_date
            FROM reservations AS m1
            HAVING @i < TIMESTAMPDIFF(MONTH, @date_start, @date_end);";
            
            // $query = "SELECT YEAR(date) AS yr
            //                 , MONTH(date) AS mth
            //                 , DATE_FORMAT(date,'%M %Y') AS display_date
            //                 , COUNT(*) AS total
            //             FROM reservations 
            //             WHERE date BETWEEN CURDATE() - INTERVAL 6 MONTH AND CURDATE() + INTERVAL 6 MONTH 
            //             GROUP
            //             BY yr,mth
            //             ORDER
            //             BY yr ASC, mth ASC;"
            ; 
        }
        else if($select ==='week'){
            //query count all reservations by daily from current day -+ 6 days
            $query ="set @date_start := (SELECT CURDATE() - INTERVAL 6 DAY), 
            @date_end := (SELECT CURDATE() + INTERVAL 6 DAY), 
            @i := 0;";
            $query2 = "SELECT DATE(ADDDATE(@date_start, INTERVAL @i:=@i+1 DAY)) AS date1, IFNULL((
                SELECT COUNT(*) FROM reservations AS m2
                WHERE DATE(m2.date) = DATE(ADDDATE(@date_start, INTERVAL @i DAY))
            ),0) AS total
            , DATE_FORMAT(ADDDATE(@date_start, INTERVAL @i:=@i+ 0 DAY), '%W %m-%d') AS display_date
            FROM reservations AS m1
            HAVING @i < DATEDIFF(@date_end, @date_start);";

            // $query = "SELECT MONTH(date) as month,
            // DAY(date) as day,
            // DATE_FORMAT(date,'%W %m-%d') AS display_date,
            // COUNT(*) as total
            // FROM reservations
            // WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 4 DAY) AND DATE_ADD(NOW(), INTERVAL 4 DAY)
            // GROUP BY month,day
            // ORDER BY day ASC";


        }
        else if ($select === 'day'){
            //query : count all reservations by hourly from 11:00 to 22:00
            $query ="set @time_start := 100000, 
            @time_end := 220000, 
            @i := 0,
            @selected_date := :selected_date,
            @date_diff = DATEDIFF(CURDATE(),@selected_date);";
        
            $query2 ="SELECT DATE_FORMAT(ADDTIME(@time_start,  @i := @i + 10000) - INTERVAL @date_diff DAY,'%W %d %H:00') AS display_date,
            IFNULL((
                SELECT COUNT(*) FROM reservations AS m2
                WHERE HOUR(m2.time) = HOUR(ADDTIME(@time_start,  @i)) AND date = @selected_date
            ),0) AS total
            
            FROM reservations AS m1
            HAVING @i < TIMEDIFF(@time_end, @time_start);";
            
            // $query = "SELECT 
            //                 DAY(date) as day,
            //                 HOUR(time) as hour,
            //                 TIME_FORMAT(time,'%H:00') AS display_date,
            //             COUNT(*) as total 
            //             FROM reservations 
                        
            //             WHERE date = CURDATE() + INTERVAL 0 DAY
            //             GROUP BY hour, day
            //             ORDER BY day";

        }
        
        
        
        
        try {
            $stmt = $this->conn->prepare($query);
                if($dateSelected){
                    $stmt->bindParam(':selected_date',$dateSelected);
                }
                else{
                    $today = date("Y-m-d");
                    $stmt->bindParam(':selected_date', $today );
                }

            $stmt->execute();
            $stmt = $this->conn->prepare($query2);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            die();
        }
        // $stmt = $this->conn->prepare($query);
        // //run query
        // if($stmt->execute()){

        // //     //reurn result
        //     return $stmt->fetchAll();
        // };
        return false;
        

    }

    public function getWeeklyData($date){
        //query : coun all reserved seat of current week

    }
}

?>




