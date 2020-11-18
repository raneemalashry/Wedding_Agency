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
            	<nav class="navbar navbar-expand-lg navbar-light">
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
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<img src="img/banner/shap-1.png" alt="">
					
						<h3> Our long Journey</h3>
						<img src="img/banner/shap-2.png" alt="">
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
            
        
        <!--================Moments Area =================-->
        <section class="moments_area">
        	<div class="container box_1620">
        		<div class="main_title">
        			<h2>Wedding & Events Planner Egypt</h2>
        			<p>
						Wedding & Events Planner Egypt offers full coordination services for the day of your event. From the moment you first meet with us, our goal is to answer all your questions and put you completely at ease. Our decades of experience in planning beautiful weddings and events has taught us the importance of clear communication. We don’t assume we know what your exact expectations are – Instead, we implement what we call round trip communication to be absolutely certain.
						
						During your planning process
						we share information with you through our private planning web site, where you can see the details of your event as it develops. We go over all the details with you personally, making sure we have had complete communication as we lead up to the event. We then take your wishes and turn them into a reality using our decades of experience and all of the specialized resources we possess.</p>
        		</div>
        		<div class="moments_inner imageGallery1">
        			<div class="gallery_item">
						<div class="h_gallery_item">
							<img src="img/moments/Image-01.jpg" alt="">
							<div class="hover">
								<a class="light" href="img/moments/Image-01.jpg"><i class="fa fa-expand"></i></a>
							</div>
						</div>
					</div>
        			<div class="gallery_item">
						<div class="h_gallery_item">
							<img src="img/moments/Image-02.jpg" alt="">
							<div class="hover">
								<a class="light" href="img/moments/Image-02.jpg"><i class="fa fa-expand"></i></a>
							</div>
						</div>
					</div>
        			<div class="gallery_item">
						<div class="h_gallery_item">
							<img src="img/moments/Image-03.jpg" alt="">
							<div class="hover">
								<a class="light" href="img/moments/Image-03.jpg"><i class="fa fa-expand"></i></a>
							</div>
						</div>
					</div>
        			<div class="gallery_item">
						<div class="h_gallery_item">
							<img src="img/moments/Image-04.jpg" alt="">
							<div class="hover">
								<a class="light" href="img/moments/Image-04.jpg"><i class="fa fa-expand"></i></a>
							</div>
						</div>
					</div>
        			<div class="gallery_item">
						<div class="h_gallery_item">
							<img src="img/moments/Image-05.jpg" alt="">
							<div class="hover">
								<a class="light" href="img/moments/Image-05.jpg"><i class="fa fa-expand"></i></a>
							</div>
						</div>
					</div>
        			<div class="gallery_item">
						<div class="h_gallery_item">
							<img src="img/moments/Image-06.jpg" alt="">
							<div class="hover">
								<a class="light" href="img/moments/Image-06.jpg"><i class="fa fa-expand"></i></a>
							</div>
						</div>
					</div>
        		</div>
        	</div>
        </section>
        <!--================End Moments Area =================-->
      
        
   
      
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="container box_1620">
        		<div class="footer_inner p_120">
        			
        			<ul class="list f_menu">
        				<li><a href="index.php">Home</a></li>
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