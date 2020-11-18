<?php
session_start();
include('dbconnect.php');
if(isset($_SESSION['plannerid']))
{
    header("location:index.php");
    exit();
 
}
else
{
    if(isset($_POST['subsignup']))
    {   $FormErrors=array();

        if(empty($_POST['email'])||empty($_POST['password']||empty($_POST['name'])||empty($_POST['mobile'])))
            {
                $FormErrors[]='FILL YOUR INFO';
            }
        if(strlen($_POST['password'])<5)
        {
            $FormErrors[]='Your Password Shouldn\'t Be Less Than 5';

        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $FormErrors[]='Email Is Not valid';
        }
        if (empty($FormErrors)) 
        {
            $name=$_POST['name'];
            $pass=sha1($_POST['password']);
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $work=$_POST['work'];
            $gender=$_POST['gender'];
            $check='';

            $res = selectQuery("planners","Email,Mobile ","1=1");
            if(mysqli_num_rows($res) > 0)
            {
                while($data = mysqli_fetch_array($res))
                {
                    if($data['Email']==$email && $data['Mobile']==$mobile)
                    {
                        $check=1;               
                    
                     }
                
                }
            }
                if($check==1)
                {
                    $formErrors[] = 'Sorry This Email or Mobile Is Exist';
                }
                else
                {
                $boolAdd =insertQuery("planners","Name,Email,Password,Mobile,Gender,Work" , "'$name','$email','$pass','$mobile','$gender', '$work'");
                if($boolAdd)
                {
                    echo "Congrats YOU Applied ";
                    header("location:login.php");
                    exit();
                  
                }
                else
                {
                    
                    echo mysqli_error($mysql_link);
                }




                }

        

                

            

            

        }
        else
        {
            foreach($FormErrors as $error)
            {
                echo $error . "</br>";
            }
          

        }
        



    }
    else
    {
        include('signup.html');

    }
}