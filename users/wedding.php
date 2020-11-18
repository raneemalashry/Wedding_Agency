
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
        <header class="header_area" >
            <div class="main_menu" >
            	<nav class="navbar navbar-expand-lg navbar-light" >
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
								<li class="nav-item"><a class="nav-link" href="wedding.php">Progressed Weddings</a></li>
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
								<?php session_start();
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
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner banner_box d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Progressed Weddings</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="wedding.php">Progressed Weddings</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Accomodation Area =================-->
        <section class="act_area p_120">
        	<div class="container">
				<div>
				
				<a  style="color:deeppink;" href='wedding.php?sort=0'><strong> Arrange From low to high prices</strong></a></br>
				<a  style="color:deeppink;" href='wedding.php?sort=1'><strong> Arrange From high to low prices</strong></a> </br>
				</div>
        		<div class="row act_inner">
				<?php 
				 
				 $sort='';
				 if(isset($_GET['sort']))
				 {
					if($_GET['sort']==0)
					{
						$sort=" ORDER BY Budget Asc";
					}
					elseif($_GET['sort']==1)
					{
						$sort=" ORDER BY Budget DESC";
					}
				}
				
                $mysql_link = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($mysql_link,"wedding_agency");
                $strQuery = "SELECT weddings.* , planners.Name AS planner , items.Name AS location FROM weddings INNER JOIN planners ON weddings.PlannerId  = planners.Id INNER JOIN items ON weddings.LocationId  = items.Id $sort";
                $res = mysqli_query($mysql_link,$strQuery);
				  if(mysqli_num_rows($res) > 0)
				  {
					  while($data = mysqli_fetch_array($res))
					  { ?>
        			<div class="col-lg-4">
        				<div class="progress_item">
        					<img class="img-fluid" src="../admin/img/weddings/<?php echo  $data['Image'];?>" alt="">
        					<div class="progress_text">
        						Couple Name :<h4 style="color:deeppink;"><?php echo  $data['CoupleName'];?></h4>
        						
        						<div class="date">
                                     Location :<a href="showitem.php?itemid=<?php echo  $data['LocationId'];?> "><p><?php echo  $data['location'];?></p> </a>
                                  Planned by:   <p><?php echo  $data['planner'];?></p> 
									Budget:<p><strong><?php echo  $data['Budget'];?></strong></p>
									Date:<p><strong><?php echo  $data['DateEvent'];?></strong></p>
        						</div>
        					</div>
        				</div>
					</div>
					<?php }
				  }
				 else
				 {
					 echo "there is no data";
				 } ?>
        		</div>
        	</div>
        </section>
        <!--================End Accomodation Area =================-->
          
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="container box_1620">
        		<div class="footer_inner p_120">
        			
        			<ul class="list f_menu">
        				<li><a href="index.php">Home</a></li>
        				<li><a href="about.php">About</a></li>
        				<li><a href="reservation.php">Reservation</a></li>
        				
        			</ul>
        			<ul class="list f_social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-behance"></i></a></li>
					</ul>

        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
       
    </body>
</html>