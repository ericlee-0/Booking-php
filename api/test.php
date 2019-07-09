<?php
    include("$_SERVER[DOCUMENT_ROOT]/config/init.php");
    echo "TEST /api/test.php"."<br/>";
    echo $redirectUri."<br/>";
    echo isset($_SERVER[https])? "https":"http";
?>