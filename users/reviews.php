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
		
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
        
      
            <!--================start Reviews Area =================-->
        
   
        <div class="container">
            <div class="row">
                <h2>Reviews <div class="pull-right"> </div></h2>
              
            </div>
            <?php if (isset($_SESSION['userid'])) { ?>
            <div class="row">
            <button id="addreview" class="btn btn-primary">Add a Review</button>
             </div>
             <hr>
            <div class="row" id="review" style="display: none;">
                <form>
                    <textarea id="content" class="form-control" placeholder="Comment content..."></textarea><br/>
                    <button id="send" class="btn btn-primary">Send</button>
                </form>
            </div>
            <?php } ?>
            <hr>
          
            <?php
            	  $mysql_link = mysqli_connect("localhost","root","");
                  $db = mysqli_select_db($mysql_link,"wedding_agency");
                 $strQuery = "SELECT reviews.Date ,reviews.Content ,users.Name FROM users INNER JOIN reviews ON reviews.User_Id  = users.Id where reviews.Approve= 1 ";
                 $res = mysqli_query($mysql_link,$strQuery);
                 if(mysqli_num_rows($res) > 0)
                 {
                     while($data = mysqli_fetch_array($res))
                     { ?>
            
            
            <div class="row comment">
                <div class="head">
                    <small><strong class='user'><?php echo $data['Name'];?></strong> <?php echo $data['Date'];?></small>
                    <p><?php echo $data['Content'];?></p>
                 </div> 
            </div>
                   
                     
                 <?php } 
				  }
				 else
				 {
					 echo "There Is No Reviews";
				 } ?>
         
         
            </div>
        </div>
        <script> 
           
                 
                    $("#addreview").click(function(){
                      
                        $('#review').show();
                        });

                    $("#send").click(function(){
                            var content =$('#content') .val();
                            $.post("content.php",{content: content },function(returenedData){
                                alert(returenedData); }
                     )});
                    
         </script>
                   
  

		
		
        <!--================End Reviews Area =================-->
        
    
        
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