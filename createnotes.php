<?php
session_start();
include('connection.php');
//get user id
$user_id = $_SESSION['user_id'];
//get current itme
$time=time();
//runa aquery to create new note
$sql="INSERT INTO notes(user_id,note,time) VALUES($user_id,'','$time')";
$result=mysqli_query($link,$sql);
if(!$result){
    echo 'error';
}else{
    //return auto generate id in the last query
    echo mysqli_insert_id($link);
}
?>