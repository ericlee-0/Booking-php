<?php

// require "vendor/autoload.php";
include("$_SERVER[DOCUMENT_ROOT]/vendor/autoload.php");
include("$_SERVER[DOCUMENT_ROOT]/config/init.php");


// required headers
header("Access-Control-Allow-Origin: ".$redirectUri);
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// database connection will be here
include("$_SERVER[DOCUMENT_ROOT]/config/Database.php");
include("$_SERVER[DOCUMENT_ROOT]/classes/User.php");

use \Firebase\JWT\JWT;
include("$_SERVER[DOCUMENT_ROOT]/config/jwtcore.php");

 
    // get database connection
    $database = new Database($url);
    $db = $database->getConnection();

    // instantiate user object
    $user = new User($db);
 
    // check email existence here
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // set product property values
    $user->email = $data->email;
    $email_exists = $user->emailExists();
    
    // files for jwt will be here

    
    


    // check if email exists and if password is correct
    if($email_exists && password_verify($data->password, $user->password)){
    
        $token = array(
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => array(
            "id" => $user->id,
            "username" => $user->userName,
            "email" => $user->email
        )
        );
    
        // set response code
        http_response_code(200);
    
        // generate jwt
        $jwt = JWT::encode($token, $key);
        echo json_encode(
                array(
                    "message" => "Successful login.",
                    "jwt" => $jwt,
                    $user->emailExists()
                )
            );
    
    }
    // login failed
    else{
    
        // set response code
        http_response_code(401);
    
        // tell the user login failed
        echo json_encode(array("message" => "Login failed."));
    }
?>