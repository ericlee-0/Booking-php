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
    
    
    // if data is not empty and successfull to insert to database
    if(!empty($data->userId) && 
       !empty($data->picked_date) && 
       !empty($data->picked_time) &&
       !empty($data->picked_people) &&
       $reser->createtable($data)){

        // set response code
        http_response_code(200);
        
        // display message: user was created
        echo json_encode(array("message" => "New reservation was created."));

    }
    //if failed 
    else{
        // set response code
        http_response_code(400);
            // echo $data;
        // display message: unable to create user
        echo json_encode(array("message" => "Unable to create a reservation."));

    }



?>