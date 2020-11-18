<?php session_start(); ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light ">
					<div class="container box_1620">
				
		
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="reservation.php">Reservation Form</a></li>
								<li class="nav-item"><a class="nav-link" href="../planner/signup.php">Join Our Team</a></li>
								<li class="nav-item"><a class="nav-link" href="reviews.php">Reviews</a></li>
								<li class="nav-item"><a class="nav-link" href="wedding.php">Progressed Wedding</a></li>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">We Provide</a>
									<ul class="dropdown-menu">
										<?php
											include('dbconnect.php');
											 $res = selectQuery("categories","Name,ID ","1=1");
											 if(mysqli_num_rows($res) > 0)
											 {
												 while($data = mysqli_fetch_array($res))
												 { ?>
											<li class="nav-item"> <a class="nav-link" href="categories.php?id=<?php echo $data['ID'];?>&catname=<?php echo $data['Name'];?> " > <?php echo $data['Name'];?> </a> </li>
												 <?php }} ?>
										
									</ul>
								</li> 
								<?php 
								if (isset($_SESSION['userid']))
								{?>
									<li class="nav-item"><a class="nav-link" href="offers.php">OFFERS</a></li>
								<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
								<li class="nav-item"><a class="nav-link" href="profile.php">profile</a></li>
								<?php }
								  else
								  {?>
									  <li class="nav-item"><a class="nav-link" href="login.php">Login In</a></li>
								  <?php }?>
								
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
 
        



<div class="container">
	<div class="row">
		<?php 
		
	   if(isset($_GET['itemid']))
	   {
		   $itemid=$_GET['itemid'];
		   $res = selectQuery("items","* ","Id=$itemid");
		   if(mysqli_num_rows($res) > 0)
		   {
			   while($data = mysqli_fetch_array($res))
			   { ?>
		<div class="col-md-3">
			<img class="img-responsive img-thumbnail center-block" src="../admin/img/items/<?php echo  $data['Image'];?>" alt="" />
		</div>
		<div class="col-md-9 item-info">
			<h2 style="color:deeppink;"><?php echo  $data['Name'];?></h2>
			<p><?php echo  $data['Description'];?></p>
			<ul class="list-unstyled">
				<li>
					<i class="fa fa-calendar fa-fw"></i>
					<span>Address</span> :<?php echo  $data['location'];?>
				</li>
				<li>
					<i class="fa fa-money fa-fw"></i>
					<span>Price</span> :<?php echo  $data['Price'];?>
				</li>
			   </br>
				<?php 
				$res1 = selectQuery("reserveitem","Reserved","ItemId =' $itemid '");
				 if(mysqli_num_rows($res1) > 0)
				 {
					  while($data1 = mysqli_fetch_array($res1))
				  { 
				if( $data1['Reserved']== 1)
				{	
					echo  "<b>" ."Reserved" ."</b>";
				} }}
				else
				{
					if (isset($_SESSION['userid']) )
							{?>
						<li>
							<form>
							<input id="itemid" hidden name="id" value='<?php  echo $itemid; ?>'>
							<input id= "reserve"  type ="submit" class="btn submit_btn"  value="Reserve Now">
							</form>
						</li>
					   <?php } 
					}
					 ?>

			</ul>
			<?php }
		}
	}?>
		</div>
	</div>
				<script>
				 $("#reserve").click(function(){
                            var itemid =$('#itemid') .val();
                            $.post("reserveitem.php",{itemid: itemid },function(returenedData){
                                alert(returenedData); }
                     )});
				</script>


	
	
	
	
	
	
   
</body>
</html>