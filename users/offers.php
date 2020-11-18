<?php
    session_start();
    if(isset($_SESSION['userid']))
    {  
        
        include('dbconnect.php');
        if(isset($_GET['offerid']))
        {
            $offerid=$_GET['offerid'];
            $rows = updateQuery("offers", "Approvedat=now()" , " ID='$offerid'");
            if($rows > 0){
                echo "Updated Successfully";
                header("location:offers.php");
                exit();
            }
            else{
                echo mysqli_error($mysql_link);
            }
    
        } 
        else
        {
            $userid=$_SESSION['userid'];
            $res1 =selectQuery("requests","Id, NameCouple"," UserID='$userid'");
            if(mysqli_num_rows($res1) > 0)
            {  while($data1 = mysqli_fetch_array($res1))
                { $dataid=$data1['Id'];
                    $dataname=$data1['NameCouple'];
                    $mysql_link = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($mysql_link,"wedding_agency");
                $strQuery = "SELECT * FROM planners INNER JOIN offers ON offers.Planner_id  = planners.Id where offers.Request_id= '$dataid' ";
                $res = mysqli_query($mysql_link,$strQuery);
                if(mysqli_num_rows($res) > 0)
                {  while($data = mysqli_fetch_array($res))
                    {
                        include('offers.html');
                            
                    }
                   
                   
                }
                
                   
              
                else
                   {
                       echo "there is no data";
                   } 
                }
               
               
            }
            
               
          
            else
               {
                   echo "there is no data";
               } 
          
        } 
      
    }
    else
    {
        include('login.html');

    }
        
        
        
        
        
      