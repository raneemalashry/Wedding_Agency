<?php
session_start();
include('dbconnect.php');
if(isset($_SESSION['adminid']))
{
	$mysql_link = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($mysql_link,"wedding_agency");
$strQuery = "SELECT items.*, categories.ID AS CatId, categories.Name AS CatName FROM items INNER JOIN categories ON items.CategoryId  = categories.ID";
$res = mysqli_query($mysql_link,$strQuery);
    
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
			<h1 > Control Items <h1>
				<div class="table100 ver1 m-b-110">
		
				
					<table data-vertable="ver1">
					
						<thead>
	
							<tr class="row100 head">
                            <th class="column100 column2" data-column="column2"> Name</th>
								<th class="column100 column2" data-column="column2">Description</th>
								<th class="column100 column3" data-column="column3">Address</th>
								<th class="column100 column8" data-column="column8">Price</th>
								<th class="column100 column8" data-column="column8">category</th>
                                <th class="column100 column8" data-column="column8">Image</th>
                                <th class="column100 column8" data-column="column8">Edit</th>
								<th class="column100 column8" data-column="column8">Delete</th>
								
                                
						
							</tr>
						</thead>

               <?php if(mysqli_num_rows($res) > 0)
                {
                    while($data = mysqli_fetch_array($res))
                    { ?>
						<tr class="row100">
                                <td class="column100 column2" data-column="column2"><?php echo $data['Name'];?></td>
                                <td class="column100 column2" data-column="column2"><?php echo $data['Description'];?></td>
                                <td class="column100 column2" data-column="column2"><?php echo $data['location'];?></td>
								<td class="column100 column2" data-column="column2"><?php echo $data['Price'];?></td>
								<td class="column100 column2" data-column="column2"><?php echo $data['CatName'];?></td>
                                <td class="column100 column2" data-column="column2"><img style="width: 50px ; height:50px" src="<?php echo "img/items/" . $data['Image'];?>" alt=""></td>
                                <td class="column100 column7" data-column="column7"><a href="itemcontrol.php?edit=<?php echo $data['Id'];?>">Edit </a> </td>
								<td class="column100 column7" data-column="column7"><a href="itemcontrol.php?delete=<?php echo $data['Id'];?>">Delete </a> </td>
			
				
								
			
                           
<?php
					}

					
					
				}
					
                    
			

                   
                
?>  
         
					
</tr>

</tbody>
</table>
<a style="font-size: 25px;" href="itemcontrol.php"><div  class="pull-right"> Add New Item </div></a>
</div>






<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
