<?php
   
   
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Something posted
        if(isset($_POST['send_form'])){
            echo "succeed".$_POST['send_form'];
        }
        else{
            echo "failed";
        }
        
    }   
   
// echo "<pre>";
//         // print_r($_POST['send_form']);
//         echo json_encode($_POST['send_form']);
//         echo "</pre>";

    // if (isset($_POST["send_form"])){
    //     // "Save Changes" clicked
    //     echo "<pre>";
        
    //     echo json_encode(array("result"=>"succeed",
    //                 "postsend_from"=>$_POST['send_form']));
    //     echo "</pre>";
    //   } else if (isset($_POST["send_form2"])){
    //     // "Delete" clicked
    //     echo "failed?";
    //     echo "<pre>";
    //     echo json_encode($_POST['send_form']);
    //     echo "</pre>";
    //   }
   
    

    
?>