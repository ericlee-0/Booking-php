<?php
//if production mode
if(getenv('CLEARDB_DATABASE_URL')){
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $redirectUri = "https://" . $_SERVER['HTTP_HOST'];

}
// development mode
else{
    include("$_SERVER[DOCUMENT_ROOT]/config.php");
    
    $url = parse_url(CLEARDB_DATABASE_URL);
    $redirectUri = isset($_SERVER['HTTPS']) ? 'https' : 'http' . "://" . $_SERVER['HTTP_HOST'];
}

    // $server = $url["host"];
    // $username = $url["user"];
    // $password = $url["pass"];
    // $db = substr($url["path"], 1);

    // $conn = new mysqli($server, $username, $password, $db);

// Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // else{
    //     echo "<br/>"."<br/>"."<br/>"."Database Connected successfully"."<br/>";
    // }

// Redirect URI
    
?>