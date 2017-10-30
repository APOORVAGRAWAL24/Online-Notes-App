<?php
session_start();
include('connection.php');

//If user_id or key is missing
if(!isset($_POST['user_id'])){
    echo '<div class="alert alert-danger">There was an error. '; exit;
}
//else
    //Store them in two variables
$user_id = $_POST['user_id'];
//Prepare variables for the query
$user_id = mysqli_real_escape_string($link, $user_id);
    //Run Query: Check combination of user_id & key exists and less than 24h old
$sql = "SELECT user_id FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
//If combination does not exist
//show an error message
$count = mysqli_num_rows($result);
if($count !== 1){
    echo '<div class="alert alert-danger">Password do not match.Please try again.</div>';
    exit;
}

//eRROR MESSAGES
$errors="";
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
if(empty($_POST["password"])){
    $errors .= $missingPassword; 
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword; 
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); 
    $errors="";
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

$password = mysqli_real_escape_string($link, $password);
$user_id= mysqli_real_escape_string($link, $user_id);


$sql="UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the new password in the database!</div>'; 
    exit;
}
else{
    echo '<div class="alert alert-danger">Password changed succesfully! <a href="index.php">Login</a></div>';
}
?>