<?php
session_start();
//database connections
include('connection.php');

$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$errors="";
//get email and store it in errors variable
if(empty($_POST["forgotemail"])){
    $errors .= $missingEmail;   
}else{
    $email = filter_var($_POST["forgotemail"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;   
    }
}

//if errors are there
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//if no errors prepare the variables for the query
$email = mysqli_real_escape_string($link, $email);
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$count = mysqli_num_rows($result);
if($count != 1){
    echo '<div class="alert alert-danger">That email does not exist in our database!</div>';
    exit;
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user_id = $row['user_id'];

$sql = "INSERT INTO forgotpassword (`user_id`) VALUES ('$user_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}
else{

echo"
<form method=post id='passwordreset'>
<input type='hidden' name='user_id' value='$user_id>
<div class='form-group'>
<label for='password' >Enter your new password:</label>
<input type='password' name='password' id='password' placeholder='Enter Password' class='form-control'>
</div>

<div class='form-group'>
<label for='password2' >Re-enter password:</label>
<input type='password' name='password2' id='password2' placeholder='Re-enter Password' class='form-control'>
</div>
<input type='submit' name='resetpassword' class='btn btn-success btn-lg' value='Reset Password'>
</form>
";
}

?>

<html>
    <script>
        //Ajax call
        $("#passwordreset").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //send them to signup.php using AJAX
    $.ajax({
        url: "storeresetpassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            
            $('#resultmessage').html(data);
        },
        error: function(){
            $("#resultmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});
    </script>
    <body>
        <div id="resultmessage"></div>
    </body>
</html>


