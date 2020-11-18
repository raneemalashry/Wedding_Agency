<?php
session_start();
if(isset($_SESSION['adminid']))
{
	include('dbconnect.php');
	$res = selectQuery("planners","*","1=1"); 
	if(isset($_GET['approve']))
	{
         $plannerid=$_GET['approve'];
        $rows = updateQuery("planners", "Approvedat=now(), RegStatus = '1'" , "Id='$plannerid'");
        if($rows > 0){
        echo "Updated Successfully";
        header("location:planner.php");
		exit();
		}
	}
	elseif(isset($_GET['delete']))
	{
		$deleteid=$_GET['delete'];
		$boolDel = deleteQuery("planners", "Id='$deleteid'");
		if($boolDel){
			echo "Deleted";
			header("location:planner.php");
			exit();
		}

	}
            
    
      
    else
        {?>
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
			<h1 > Approve  Planners <h1>
				<div class="table100 ver1 m-b-110">
				
					<table data-vertable="ver1">
					
						<thead>
	
							<tr class="row100 head">
								
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column3" data-column="column3">Mobile</th>
								<th class="column100 column4" data-column="column4">Gender</th>
								<th class="column100 column5" data-column="column5">Email</th>
								<th class="column100 column6" data-column="column6">WORK</th>
								<th class="column100 column8" data-column="column8">Approved at</th>
								<th class="column100 column8" data-column="column8">Delete</th>
								<th class="column100 column8" data-column="column8">Approve</th>
						
							</tr>
						</thead>

               <?php if(mysqli_num_rows($res) > 0)
                {
                    while($data = mysqli_fetch_array($res))
                    { ?>
						<tr class="row100">
								
								<td class="column100 column2" data-column="column2"><?php echo $data['Name'];?></td>
								<td class="column100 column3" data-column="column3"><?php echo $data['Mobile'];?></td>
								<td class="column100 column4" data-column="column4"><?php echo $data['Gender'];?></td>
								<td class="column100 column5" data-column="column5"><?php echo $data['Email'];?></td>
								<td class="column100 column5" data-column="column5"><?php echo $data['Work'];?></td>
								<td class="column100 column6" data-column="column6"><?php echo $data['Approvedat'];?></td>
								<td class="column100 column7" data-column="column7"><a href="planner.php?delete=<?php echo $data['Id'];?>">Delete </a> ></td>
				<?php if($data['RegStatus']==0) {?><td class="column100 column7" data-column="column7"><a href="planner.php?approve=<?php echo $data['Id'];?>" >Approve </a> ></td>
				<?php } ?>
								
			
                           
<?php
					}

					
					
				}
					
                    
			

                   
                
}  }?>            
					
</tr>
</tbody>
</table>
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
