<?php
session_start();
include('dbconnect.php');
if(isset($_SESSION['userid']))
{   $userid=$_SESSION['userid'];
    if(isset($_POST['subupdate']))
    {
       
        $pass='';
			if(empty($_POST['newpassword']))
			{
				$pass=$_POST['oldpassword'];
			}
			else{
				$pass=sha1($_POST['newpassword']);
			}
        $name=$_POST['name'];
         $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        $gender=$_POST['gender'];
        $rows =updateQuery("users", "Name='$name', Email='$email', Mobile='$mobile',Address='$address',Gender='$gender',Password='$pass'", "id='$userid'");
        if($rows > 0){
            echo "Updated Successfully";
            header("location:profile.php");
            exit();
        }
        else{
            echo mysqli_error($mysql_link);
        }


    }

   
    $res =selectQuery("users","*"," Id=$userid");
    if(mysqli_num_rows($res) > 0)
    {
        while($data = mysqli_fetch_array($res))
        {
            include('profile.html');
          
        }
    
  
    }
    else
    {
        echo "there is no data";
    }
    
}
else
{
    include('login.html');
}

?>