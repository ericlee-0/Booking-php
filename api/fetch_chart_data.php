<?php

include("$_SERVER[DOCUMENT_ROOT]/config/init.php");
include("$_SERVER[DOCUMENT_ROOT]/config/Database.php");
include("$_SERVER[DOCUMENT_ROOT]/classes/Reservation.php");



// required headers
// header("Access-Control-Allow-Origin: ".$redirectUri);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

 
// get database connection
    $database = new Database($url);
    $db = $database->getConnection();

 
// instantiate product object
    $reser = new Reservation($db);

// get posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // echo "fetch_chartdata.php".$data."<br/>";
    
    // if monthly data requested
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['chart']==='monthly_chart'){
            //if data exist
            
            if($reser->getCurrentData('month')){
                http_response_code(200);
                echo json_encode(array("message" => "fetched data",
                                    
                                        "data"=>$reser->getCurrentData('month')));
            }
            //if no data
            else{
                http_response_code(404);
                // echo $data;
                // display message: unable to get data
                echo json_encode(array("message" => "Unable to fetch data."));
            }
        }
        else if($_POST['chart']=== 'weekly_chart'){
            //if data exist
            // echo json_encode(array("message" => "monthly data requested.")); 
            if($reser->getCurrentData('week')){
                http_response_code(200);
                echo json_encode(array("message" => "fetched data",
                                    
                                        "data"=>$reser->getCurrentData('week')));
            }
            //if no data
            else{
                http_response_code(404);
                // echo $data;
                // display message: unable to get data
                echo json_encode(array("message" => "Unable to fetch data."));
            }

        }
        else if($_POST['chart']=== 'daily_chart'){
            //if data exist
            // echo json_encode(array("message" => "monthly data requested.")); 
            if($reser->getCurrentData('day')){
                http_response_code(200);
                echo json_encode(array("message" => "fetched data",
                                    
                                        "data"=>$reser->getCurrentData('day')));
            }
            //if no data
            else{
                http_response_code(404);
                // echo $data;
                // display message: unable to get data
                echo json_encode(array("message" => "Unable to fetch data."));
            }

        }
        else{
        

            // set response code
            http_response_code(408);
            
            // display message: user was created
            echo json_encode(array("message" => "No request",
                                    "data"=> $_POST['monthly_chart'],
                                    $_REQUEST['POST']
                                    ));

        }
    }

    
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // if (isset($_POST['send'])) {
    //     echo "post send";
    //     if ($_POST['send'] == 'save') {
    //         http_response_code(401);
    //         echo json_encode(array("message" => "POPST SEND SAVE",
    //             "data"=>$data
                                    
    //         ));
    //         // Set session variables
    //     } elseif ($_POST['send'] == 'send') {
    //         http_response_code(402);
    //         // Insert all data into database
    //         echo json_encode(array("message" => "POPST SEND SEND",
    //         "datasend"=>$data
                                    
    //         ));
    //     }
     
    //  }

?>