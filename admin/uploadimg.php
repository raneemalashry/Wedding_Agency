<?php 
include('dbconnect.php');
    
     if(isset($_POST['subfile'])  )
     { 
        
            
             $img = $_FILES['f1'];
             $fname = $img['name'];
             $ftmp = $img['tmp_name'];
            
             if(!empty($fname))
             {
                 $rand = rand(0,1000000);
                 $newfname = $rand."-".$fname;
                $bool= move_uploaded_file($ftmp, 'img/progress/'. $newfname );
                 
                if($bool==true)
                {
                        $strQuery = "INSERT INTO Images(Image) 
                        VALUES ('$newfname')";
                        $boolAdd = mysqli_query($mysql_link,$strQuery);
                        if($boolAdd==true)
                        {
                             
                                 header("location:index.php");
                               
                                
                        
                        }
                        else
                        {
                                
                                echo mysqli_error($mysql_link);
                        } 
                }
               
             }   
       
  
     
 
    
     }

 
 