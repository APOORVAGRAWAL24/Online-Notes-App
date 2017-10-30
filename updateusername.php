<?php
//start session and connect to databse
session_start();
include ('connection.php');


// get the user id

$id = $_SESSION['user_id'];

//get the new username
$username=$_POST['username'];

//run our query and upate the username
$sql="UPDATE users SET username='$username' WHERE user_id='$id'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo'<div class="alert alert-danger">There was an error storing the new username in the database!</div>';
}
?>