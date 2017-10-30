<?php
session_start();
include('connection.php');

//get te user id
$user_id=$_SESSION['user_id'];

$sql="DELETE FROM notes WHERE note=''";
$result=mysqli_query($link,$sql);
if(!$result){
    echo '<div class="alert alert-warning">An error occured</div>';
    exit;
}

$sql="SELECT *FROM notes WHERE user_id='$user_id'ORDER BY time DESC";

//SHOW ALERT MESSAGES
if($result=mysqli_query($link,$sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $note=$row['note'];
            $time= $row['time'];
            $note_id=$row['id'];
            date_default_timezone_set('Asia/Kolkata');
            $time=date("F d,Y h:i:s A",$time);
            
            
           echo"
           <div class='note'>
           <div class='col-xs-5 col-sm-3 delete'>
           <button class='btn-lg btn-danger' style='width:100%'>Delete</button>
           </div>
           <div class='noteheader' id='$note_id'>
<div class='text'>$note</div>
<div class='timetext'>$time</div>
</div>
</div>"; 
        }
    }else{
        echo '<div class="alert alert-warning">You have not created any notes yet!</div>';
    exit;
    }
    
}else{
    echo '<div class="alert alert-warning">An error occured</div>';
    exit;
    
}

?>