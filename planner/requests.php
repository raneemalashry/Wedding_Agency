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
    </head>
    <body>
      

    <?php 
        include('dbconnect.php');
         $res =selectQuery("requests","*","1=1");
         if(mysqli_num_rows($res) > 0)
         {
             while($data = mysqli_fetch_array($res))
             { ?>
    <section class="progress_area">
        <div class="container box_1620">
            <div class="main_title">
            <a href="offer.php?requestid=<?php echo $data['Id']; ?>"> OFFER></a>
               
            </div>
            <div class="row progress_inner">
                <div class="col-lg-3">
                  
                            <a href="#"><?php echo $data['NameCouple'];?></a>
                            <p>  <?php echo $data['Notes'];?></p>
                            <div class="date">
                                <a href="#">Date:  <?php echo $data['DateEvent'];?></a></br>
                                <a href="#">number of guests: <?php echo $data['NumberOfGuests'];?></a> </br>
                                <a href="#">Budget:  <?php echo $data['Budget'];?></a>
                        
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }
				  }
				 else
				 {
					 echo "there is no data";
				 } ?>
    
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="container box_1620">
        		<div class="footer_inner p_120">
        			
        			<ul class="list f_menu">
        				<li><a href="index.php">Home</a></li>
        				<li><a href="../users/about.php">About</a></li>
        				<li><a href="requests.php">Requests</a></li>
        				
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