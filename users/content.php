<?php
session_start();
include("dbconnect.php");
if(isset($_POST['content'])){
    $userid=$_SESSION['userid'];
    $content = $_POST['content'];
    $boolAdd =  insertQuery("reviews", "Content,User_id", "'$content','$userid'");
    if($boolAdd)
    {
        echo "Thank You For Your Review ";
    }
    
}