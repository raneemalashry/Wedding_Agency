<?php
session_start();

if(isset($_SESSION['plannerid']))
{
     $plannerid=$_SESSION['plannerid'];
    $requestid ="";
    $formerror='';
    if(isset($_GET['requestid']))
    {
        if(empty($formerror))
        {  
            $requestid=$_GET['requestid'];
            include('offer.html');
        }
        else
        {
            echo "fill Your Application";
        }

    } 
    else
    {
       include('requests.php');
    }
    
    if(isset($_POST['suboffer']))
    { 
        if(empty($_POST['offer']))
                {
                    $formerror= 'FILL YOUR Application';
                }
               
            else
                   {
                        $offer=$_POST['offer'];
                        include('dbconnect.php');
                        $boolAdd = insertQuery("offers", "Offer,Request_id,Planner_id", "'$offer','$requestid','$plannerid' ");
                        if($boolAdd)
                        {
                            echo "Congrats YOUr offer sent ";
                            header("location:requests.php");
                        
                        }
                        else
                        {
                            echo mysqli_error($mysql_link);
                        }
                   }
     }
     
                            
}
    


