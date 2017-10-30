<?php
//start session and connect to databse
session_start();
include ('connection.php');

//get user_id and new email sent through Ajax
$user_id = $_SESSION['user_id'];
$newemail = $_POST['email'];

//check if new email exists
$sql = "SELECT * FROM users WHERE email='$newemail'";
$result = mysqli_query($link, $sql);
$count = $count = mysqli_num_rows($result);
if($count>0){
    echo "<div class='alert alert-danger'>There is already as user registered with that email! Please choose another one!</div>"; exit;
}


//get the current email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $email = $row['email']; 
}else{
    echo "<div class='alert alert-danger'>There was an error retrieving the email from the database</div>";exit;   
}


//Prepare variables for the query
$email = mysqli_real_escape_string($link, $email);
$newemail = mysqli_real_escape_string($link, $newemail);
    //Run query: update email

$sql = "UPDATE users SET email='$newemail'WHERE email='$email'";
$result = mysqli_query($link, $sql);
    //If query is successful, show success message
if(mysqli_affected_rows($link) == 1){
    session_destroy();
    echo '<div class="alert alert-success">Your email has been updated. <a href="index.php">Login</a></div>';
    
}else{
    //Show error message
    echo '<div class="alert alert-danger">Your email could not be updated. Please try again later.</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    
}
?>