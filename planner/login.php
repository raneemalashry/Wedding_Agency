<?php
session_start();
if(isset($_SESSION['plannerid']))
{
    header("location:index.php");
    exit();}
else
{
        if(isset($_POST['sublogin']))
        {
    
            if(empty($_POST['email'])||empty($_POST['password']))
            {
            
                $FormErrors[]='FILL YOUR INFO';
            
           
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $FormErrors[]='Email Is Not valid';
            }
            if (empty($FormErrors)) 
            {
                $email=$_POST['email'];
                $password=sha1($_POST['password']) ;
                include_once('dbconnect.php');  
                $res =  selectQuery("planners","Email,Id ,Password, RegStatus","1=1");
                if(mysqli_num_rows($res) > 0)
                {
                    while($data = mysqli_fetch_array($res))
                    {  
                        if($data['Email']==$email && $data['Password']=$password)
                        {
                             
                           
                            if($data['RegStatus']==0)
                            {
                                echo " your application hasn't been approved yet";
                                exit();
                            }
                            else
                            {
                                $_SESSION['plannerid']=$data['Id'];
                                echo 'you loogged in correctly';
                                
                                header("location:index.php");
                                exit();

                            }
                           
                        }
                       

                      
              
                    }
                   
                 echo 'Your Password or E-mail Is Incorrect';
                    
                }
                else
                {
                    echo "there is no data";
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
            include('login.html');
        }




}



