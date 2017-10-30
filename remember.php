<?php
session_start();
if(!isset($SESSION['user_id'])){
    
}
else{
     $_SESSION['user_id'] = $row['user_id'];
        header("location:mainpageloggedin.php");
}
?>