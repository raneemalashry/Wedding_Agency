<?php session_start(); ?>
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
    
    <section class="banner_area">
            <div class="banner_inner banner_box d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Categories</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							
						</div>
					</div>
				</div>
            </div>
        </section>
    <!--================End Home Banner Area =================-->
    <section class="act_area p_120">
        	<div class="container">
             <?php if (isset($_GET['id']))
                { 
                    $sort='';
                    $search='';
                    $catid=$_GET['id'];
                    if(isset($_GET['sort']))
                    {
                       if($_GET['sort']==0)
                       {
                           $sort=" ORDER BY Price Asc";
                       }
                       elseif($_GET['sort']==1)
                       {
                           $sort=" ORDER BY Price DESC";
                       }
                   }
                   if(isset($_POST['search']))
                       { 
                            $key=$_POST['keyword'];
                            $search="AND Name LIKE '%$key%' ";
                       }
                       $res = selectQuery("items","* ","CategoryId = $catid $search $sort");
                 
                       
                   
                 ?>
				<div class="res_form_inner">
                <div class="container">
                <form  class="reservation_form row" action="categories.php?id=<?php echo $catid; ?>" method="post">
                <div>
               <b style="color:deeppink;"> Search:</b> <input class="form-control"  type="text" placeholder='Search by name' name="keyword" /> </br>
               <input class="btn submit_btn" type="submit" name="search" value="Search" />
               </div>
                </form>
                </div>
                </div>
                <?php if (($search)==null)
                {?>
                <div>
               
				<a style="color:deeppink;" href="categories.php?id=<?php echo $catid; ?>&sort=0"><strong> Arrange From low to high prices</strong></a></br>
                <a  style="color:deeppink;" href="categories.php?id=<?php echo $catid; ?>&sort=1"><strong> Arrange From high to low prices</strong></a> </br>
               
                </div>
                <?php }?>
        		<div class="row act_inner">
				<?php 
           
                    if(mysqli_num_rows($res) > 0)
                    {
                        while($data = mysqli_fetch_array($res))
                        { 
                           $itemid= $data['Id'];
                            $res1 = selectQuery("reserveitem","Reserved","ItemId =' $itemid '");
                            ?>
                
				  
              
                            <div class="col-lg-4">
                                <div class="progress_item">
                                    <img class="img-fluid" src="../admin/img/items/<?php echo  $data['Image'];?>" alt="">
                                    <div class="progress_text">
                                        <a href="showitem.php?itemid=<?php echo $itemid;?> "><h4 style="color:deeppink;"><?php echo  $data['Name'];?></h4> </a>
                                        Description :<p><?php echo  $data['Description'];?></p>
                                        <div class="date">
                                        <?php if(isset($data['location']))
                                        { ?>
                                        Address:<p><?php echo  $data['location'];?></p>
                                        <?php }?>
                                        Price:	<p><strong><?php echo  $data['Price'];?></strong></p>
                                        <?php    if(mysqli_num_rows($res1) > 0)
                                        {
                                             while($data1 = mysqli_fetch_array($res1))
                                         { 
                                        if($data1['Reserved']==1){ ?>
                                            <p><strong>Reserved</strong></p>
                                        <?php }
                                        }}?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                        <?php 
                    }
				  }
				 else
				 {
					 echo "there is no data";
                 }
                 } 
                ?>
        		</div>
        	</div>
        </section>



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