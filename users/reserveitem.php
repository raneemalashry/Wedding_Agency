<?php
session_start();
include("dbconnect.php");
if(isset($_POST['itemid'])){
    $userid=$_SESSION['userid'];
    $itemid = $_POST['itemid'];
    $boolAdd =  insertQuery("reserveitem", "UserId,ItemId,Reserved", "'$userid','$itemid','1'");
    if($boolAdd)
    {
        
        echo "Congrats This Item Reserved";
       
    }
   
    
}