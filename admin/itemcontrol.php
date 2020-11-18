<?php

use function PHPSTORM_META\elementType;

include('dbconnect.php');
if(isset($_GET['edit']))
{
     $editid=$_GET['edit'];
   if(isset($_POST['subupdate']))
   {
       $name=$_POST['name'];
    $description=$_POST['Description'];
       $location=$_POST['location'];
       $price=$_POST['Price'];
       $img = $_FILES['item'];
       $fname = $img['name'];
       $ftmp = $img['tmp_name'];
       $category =$_POST['category'];
       
      
       if(!empty($fname))
       {
           $rand = rand(0,1000000);
            $newfname = $rand."-".$fname;
            $bool= move_uploaded_file($ftmp, 'img/items/'. $newfname );
                
                if($bool==true )
                {
                    $rows =updateQuery("items", "Name='$name', Description='$description', location='$location',Price='$price',Image='$newfname' ,CategoryId='$category' ","Id=$editid" );
                    if($rows > 0){ 
                        echo "Updated Successfully";
                        header("location:items.php");
                        exit();
                    }
                    else{
                        echo mysqli_error($mysql_link);
                    }
        
                }
        }
        else
        {
            $rows =updateQuery("items", "Name='$name', Description='$description',location='$location',Price='$price',CategoryId='$category'","Id=$editid" );
            if($rows > 0){
                echo "Updated Successfully";
                header("location:items.php");
                exit();
                }
        }
    }
    else
    {
  
                     $mysql_link = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($mysql_link,"wedding_agency");
             $strQuery = "SELECT items.*, categories.ID AS CatId, categories.Name AS CatName FROM items INNER JOIN categories ON items.CategoryId  = categories.ID where items.Id=$editid ";
             $res = mysqli_query($mysql_link,$strQuery);
             if(mysqli_num_rows($res) > 0)
        {
            while($data = mysqli_fetch_array($res))
            {
                include('edititem.html');
                
            }
        
        
        
        }
        else
        {
            echo "there is no data";
        }
    }
}



elseif(isset($_GET['delete']))
{
    $deleteid=$_GET['delete'];
    $boolDel = deleteQuery("items", "Id='$deleteid'");
    if($boolDel){
        echo "Deleted";
        header("location:items.php");
        exit();
    }
}
else
{
    if(isset($_POST['subnew']))
    {
        $name=$_POST['name'];
        $description=$_POST['Description'];
        $location=$_POST['location'];
        $price=$_POST['Price'];
        $img = $_FILES['item'];
        $fname = $img['name'];
        $ftmp = $img['tmp_name'];
        $category =$_POST['category'];
        if(!empty($fname) && !empty($name) && !empty($price)&& !empty($category))
        {
            $rand = rand(0,1000000);
             $newfname = $rand."-".$fname;
             $bool= move_uploaded_file($ftmp, 'img/items/'. $newfname );
                 
                 if($bool==true)
                 {
                     $rows =insertQuery("items", "Name, Description ,location,Price,Image,CategoryId", "'$name' , '$description' , '$location' ,'$price' ,'$newfname','$category'");
                     if($rows > 0){
                         echo "inserted Successfully";
                         header("location:items.php");
                         exit();
                     }
                    
         
                 }
         }
         else
         {
            echo "please fill the form correctly ";
         }

    }
    else
    {
        include('newitem.html');
    }
}