<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Londn</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="assets/images2/favicon.ico" type="image/x-icon" media="all">
        <meta name="title" content="Website Title">
  		<meta name="description" content="">
  		<meta name="keywords" content="">
  		<meta name="author" content="Londn">

        <link rel="stylesheet" href="assets/css2/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts2/fontawesome/css/all.css">
        <link rel="stylesheet" href="assets/css2/normalize.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cormorant:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
		<!-- <link rel="stylesheet" href="assets/css2/animate.css">
        <link rel="stylesheet" href="assets/css2/aos.css">
        <link rel="stylesheet" href="assets/css2/owl.carousel.css"> -->
        <link rel="stylesheet" href="assets/css2/style.css">
        <link rel="stylesheet" href="assets/css2/responsive.css">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
		
        <?php 
//session_start();
		include_once "Model/Product.php";
		include_once "Model/showprodctdetailscart.php";
		  include_once "Model/Db_Connection.php";
		  include_once"Model/function.php";
		include_once "getip.php";

		?>
    </head>
    <body>

		<!-- Navbar -->
			<div class="top-header">
				<a class="navbar-brand" href="#">
					<img src="assets/images2/logo.png" width="200" class="img-fluid" alt="img" />
				</a>
				<div class="d-block d-sm-none float-right mt-2">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				    	<span class="fa fa-bars"></span>
				    </button>
				</div>
			</div>
			<nav class="navbar navbar-expand-sm custom-navbar">
				<div class="container">
				    <div class="justify-content-left navLeft">
				    	<img src="assets/images2/wishlist-icon.png" class="img-fluid" alt="img" />&emsp;Wishlist
				    </div>
				    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				    	<span class="fa fa-bars"></span>
				    </button> -->
				  <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
				    <ul class="navbar-nav">
					    <li><a href="index.php">home</a></li>
						<li><a href="#">our story</a></li>
						<li><a href="productslist.php">shop</a></li>
						<li><a href="blog.php">blog</a></li>
						<li><a href="contactus.php">contact us</a></li> 
				    </ul>
				  </div>
				  <div class="justify-content-right navRight">
				    	<img src="assets/images2/cart-icon.png" class="img-fluid" alt="img" />
				    	<!-- <img src="assets/images2/menu-icon.png" class="img-fluid" alt="img" /> -->
				  </div> 
			  </div> 
			</nav>

		<main>
			<?php 
    			$db_obj=DB_Connection::db_connect();
    			//Section 2 Start
				$home_bg_img1="SELECT * FROM `home_images` where name ='home-bg'";
				$result=$db_obj->query($home_bg_img1);

				while ($row=$result->fetch_array()) {
					
					$home_bg_img1_name=$row['name'];
					$home_bg_img1_image_name=$row['image_name'];
					$home_h1_name=$row['h1'];
					$home_h3_name=$row['h3'];
					$home_h4_name=$row['h4'];
					$home_a_name=$row['a'];
					// $section2_img1_title=$row['title'];
					// $section2_img1_description=$row['description'];
					// $section2_img1_price=$row['price'];
				}

				$home_bg_img1="SELECT * FROM `home_images` where name ='section1-text'";
				$result=$db_obj->query($home_bg_img1);

				while ($row=$result->fetch_array()) {
					
					$home_h2_name=$row['h2'];
					$home_h3_name=$row['h3'];
					$home_p1_name=$row['p1'];
					$home_p2_name=$row['p2'];
					// $section2_img1_title=$row['title'];
					// $section2_img1_description=$row['description'];
					// $section2_img1_price=$row['price'];
				}
			?>

		    <!-- Home Section Starts -->
		    <style type="text/css">
		    	.home-section {
				  margin: 50px 0;
				  background-color: #fff;
				  background-image: url(assets/images2/<?php echo $home_bg_img1_image_name;?>);
				  background-size: cover;
				  background-position: top left;
				}
		    </style>
		    <section>
		    	<div class="container-fluid p-0">
		    		<div class="home-section">
			            <div class="row">
			                <div class="col-sm-6 offset-sm-6 col-12">
			                    <div class="home-right">
			                    	<h3><?php echo $home_h3_name;?></h3>
			                    	<h1><?php echo $home_h1_name;?></h1>
			                    	<div class="bg-heading">
			                    		<h4><?php echo $home_h4_name;?></h4>
			                    	</div>
			                    	<a href="/" class="custom-btn mt-5"><?php echo $home_a_name;?></a>
			                    </div>
			                </div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Home Section Ends -->

		    <!-- Section 1 Starts -->
		    <section>
		    	<div class="section1">
		        	<div class="container-fluid p-0">
		        		<div class="row">
		        			<div class="col-sm-12 col-12">
		        				<div class="section1-heading">
		        					<h2><?php echo $home_h2_name;?></h2>
		        				</div>
		        			</div>
		        		</div>

			            <div class="row">
			                <div class="col-sm-8 offset-sm-2 col-12">
			                    <div class="section1-left">
			                        <h3><?php echo $home_h3_name;?></h3>
			                        <p><?php echo $home_p1_name;?></p>
									<p><?php echo $home_p2_name;?> 
									</p>
			                    </div>
			                </div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Section 1 Ends -->
		    <?php 
		        			$db_obj=DB_Connection::db_connect();
		        			//Section 2 Start

		        			$section2_text="SELECT * FROM `home_images` where name ='section2-text'";
							$result=$db_obj->query($section2_text);

							while ($row=$result->fetch_array()) {
								
								$section2_h2_name=$row['h2'];
							}

							$section2_img1="SELECT * FROM `home_images` where name ='section2-img1'";
							$result=$db_obj->query($section2_img1);

							while ($row=$result->fetch_array()) {
								
								$section2_img1_name=$row['name'];
								$section2_img1_image_name=$row['image_name'];
								$section2_img1_title=$row['title'];
								$section2_img1_description=$row['description'];
								$section2_img1_price=$row['price'];
							}

							$section2_img2="SELECT * FROM `home_images` where name ='section2-img2'";
							$result=$db_obj->query($section2_img2);

							while ($row=$result->fetch_array()) {
								
								$section2_img2_name=$row['name'];
								$section2_img2_image_name=$row['image_name'];
								$section2_img2_title=$row['title'];
								$section2_img2_description=$row['description'];
								$section2_img2_price=$row['price'];
							}

							$section2_img3="SELECT * FROM `home_images` where name ='section2-img3'";
							$result=$db_obj->query($section2_img3);

							while ($row=$result->fetch_array()) {
								
								$section2_img3_name=$row['name'];
								$section2_img3_image_name=$row['image_name'];
								$section2_img3_title=$row['title'];
								$section2_img3_description=$row['description'];
								$section2_img3_price=$row['price'];
							}
							$section2_img4="SELECT * FROM `home_images` where name ='section2-img4'";
							$result=$db_obj->query($section2_img4);

							while ($row=$result->fetch_array()) {
								
								$section2_img4_name=$row['name'];
								$section2_img4_image_name=$row['image_name'];
								$section2_img4_title=$row['title'];
								$section2_img4_description=$row['description'];
								$section2_img4_price=$row['price'];
							}
							//Section 2 End

							//Section 3 Start
							$section3_img="SELECT * FROM `home_images` where name ='section3-img1'";
							$result=$db_obj->query($section3_img);

							while ($row=$result->fetch_array()) {
								
								$section3_img_name=$row['name'];
								$section3_img_image_name=$row['image_name'];
								$section3_p1_name=$row['p1'];
								$section3_p2_name=$row['p2'];
							}
							//Section 3 End

							//Section 4 Start
							$section4_img="SELECT * FROM `home_images` where name ='section4-img1'";
							$result=$db_obj->query($section4_img);

							while ($row=$result->fetch_array()) {
								
								$section4_img_name=$row['name'];
								$section4_img_image_name=$row['image_name'];
							}

							$section4_bg_img="SELECT * FROM `home_images` where name ='section4-bg'";
							$result=$db_obj->query($section4_bg_img);

							while ($row=$result->fetch_array()) {
								
								$section4_img_bg_name=$row['name'];
								$section4_img_bg_image_name=$row['image_name'];
								$section4_h2_name=$row['h2'];
								$section4_h3_name=$row['h3'];
								$section4_p1_name=$row['p1'];
								$section4_a_name=$row['a'];
							}
							//Section 4 End

							//Section 5 Start
							$section5_img1="SELECT * FROM `home_images` where name ='section5-img1'";
							$result=$db_obj->query($section5_img1);

							while ($row=$result->fetch_array()) {
								
								$section5_img1_name=$row['name'];
								$section5_img1_image_name=$row['image_name'];
							}

							$section5_img2="SELECT * FROM `home_images` where name ='section5-img2'";
							$result=$db_obj->query($section5_img2);

							while ($row=$result->fetch_array()) {
								
								$section5_img2_name=$row['name'];
								$section5_img2_image_name=$row['image_name'];
							}

							$section5_img3="SELECT * FROM `home_images` where name ='section5-img3'";
							$result=$db_obj->query($section5_img3);

							while ($row=$result->fetch_array()) {
								
								$section5_img3_name=$row['name'];
								$section5_img3_image_name=$row['image_name'];
							}

							$section5_text="SELECT * FROM `home_images` where name ='section5-text'";
							$result=$db_obj->query($section5_text);

							while ($row=$result->fetch_array()) {
								
								$section5_h2_name=$row['h2'];
								$section5_p1_name=$row['p1'];
								$section5_a_name=$row['a'];
							}
							//Section 5 End

							// //Section 6 Start
							$section6_img="SELECT * FROM `home_images` where name ='section6-bg'";
							$result=$db_obj->query($section6_img);

							while ($row=$result->fetch_array()) {
								
								$section6_img_name=$row['name'];
								$section6_img_image_name=$row['image_name'];
								$section6_h3_name=$row['h3'];
							}
							// //Section 6 End

							//Section 7 Star
							$section7_text="SELECT * FROM `home_images` where name ='section7-text'";
							$result=$db_obj->query($section7_text);

							while ($row=$result->fetch_array()) {
								
								$section7_h2_name=$row['h2'];
							}

							$section7_img1="SELECT * FROM `home_images` where name ='section7-img1'";
							$result=$db_obj->query($section7_img1);

							while ($row=$result->fetch_array()) {
								
								$section7_img1_name=$row['name'];
								$section7_img1_image_name=$row['image_name'];
							}

							$section7_img2="SELECT * FROM `home_images` where name ='section7-img2'";
							$result=$db_obj->query($section7_img2);

							while ($row=$result->fetch_array()) {
								
								$section7_img2_name=$row['name'];
								$section7_img2_image_name=$row['image_name'];
							}

							$section7_img3="SELECT * FROM `home_images` where name ='section7-img3'";
							$result=$db_obj->query($section7_img3);

							while ($row=$result->fetch_array()) {
								
								$section7_img3_name=$row['name'];
								$section7_img3_image_name=$row['image_name'];
							}

							$section7_img4="SELECT * FROM `home_images` where name ='section7-img4'";
							$result=$db_obj->query($section7_img1);

							while ($row=$result->fetch_array()) {
								
								$section7_img4_name=$row['name'];
								$section7_img4_image_name=$row['image_name'];
							}

							$section7_img5="SELECT * FROM `home_images` where name ='section7-img5'";
							$result=$db_obj->query($section7_img2);

							while ($row=$result->fetch_array()) {
								
								$section7_img5_name=$row['name'];
								$section7_img5_image_name=$row['image_name'];
							}

							$section7_img6="SELECT * FROM `home_images` where name ='section7-img6'";
							$result=$db_obj->query($section7_img3);

							while ($row=$result->fetch_array()) {
								
								$section7_img6_name=$row['name'];
								$section7_img6_image_name=$row['image_name'];
							}

							$section7_img7="SELECT * FROM `home_images` where name ='section7-img7'";
							$result=$db_obj->query($section7_img1);

							while ($row=$result->fetch_array()) {
								
								$section7_img7_name=$row['name'];
								$section7_img7_image_name=$row['image_name'];
							}

							$section7_img8="SELECT * FROM `home_images` where name ='section7-img8'";
							$result=$db_obj->query($section7_img2);

							while ($row=$result->fetch_array()) {
								
								$section7_img8_name=$row['name'];
								$section7_img8_image_name=$row['image_name'];
							}

							$section7_img9="SELECT * FROM `home_images` where name ='section7-img9'";
							$result=$db_obj->query($section7_img3);

							while ($row=$result->fetch_array()) {
								
								$section7_img9_name=$row['name'];
								$section7_img9_image_name=$row['image_name'];
							}

							$section7_img10="SELECT * FROM `home_images` where name ='section7-img10'";
							$result=$db_obj->query($section7_img1);

							while ($row=$result->fetch_array()) {
								
								$section7_img10_name=$row['name'];
								$section7_img10_image_name=$row['image_name'];
							}

							$section7_img11="SELECT * FROM `home_images` where name ='section7-img11'";
							$result=$db_obj->query($section7_img2);

							while ($row=$result->fetch_array()) {
								
								$section7_img11_name=$row['name'];
								$section7_img11_image_name=$row['image_name'];
							}

							$section7_img12="SELECT * FROM `home_images` where name ='section7-img12'";
							$result=$db_obj->query($section7_img3);

							while ($row=$result->fetch_array()) {
								
								$section7_img12_name=$row['name'];
								$section7_img12_image_name=$row['image_name'];
							}

							$section7_img13="SELECT * FROM `home_images` where name ='section7-img13'";
							$result=$db_obj->query($section7_img1);

							while ($row=$result->fetch_array()) {
								
								$section7_img13_name=$row['name'];
								$section7_img13_image_name=$row['image_name'];
							}

							$section7_img14="SELECT * FROM `home_images` where name ='section7-img14'";
							$result=$db_obj->query($section7_img2);

							while ($row=$result->fetch_array()) {
								
								$section7_img14_name=$row['name'];
								$section7_img14_image_name=$row['image_name'];
							}

							$section7_img15="SELECT * FROM `home_images` where name ='section7-img15'";
							$result=$db_obj->query($section7_img1);

							while ($row=$result->fetch_array()) {
								
								$section7_img15_name=$row['name'];
								$section7_img15_image_name=$row['image_name'];
							}

							$section7_img16="SELECT * FROM `home_images` where name ='section7-img16'";
							$result=$db_obj->query($section7_img2);

							while ($row=$result->fetch_array()) {
								
								$section7_img16_name=$row['name'];
								$section7_img16_image_name=$row['image_name'];
							}

							//Section 7 End
		        		?>
		    <!-- Section 2 Starts -->
		    <section>
		        <div class="container-fluid p-0">
		        	<div class="section2">
		        		<div class="row">
		        			<div class="col-sm-12 col-12">
		        				<div class="section2-heading">
		        					<h2><?php echo $section2_h2_name;?></h2>
		        				</div>
		        			</div>
		        		</div>
		        		
			            <div class="row">
			                <div class="col-sm-3 col-12">
			                    <div class="section2-box">
			                    	<a data-fancybox="gallery" href="assets/images2/<?php echo $section2_img1_image_name;?>">
										<img src="assets/images2/<?php echo $section2_img1_image_name;?>" class="img-fluid" alt="img"  height="222" width="222">
									</a>
			                    	<!-- <img src="assets/images2/<?php echo $section2_img1_image_name;?>" class="img-fluid" alt="img" height="222" width="222" /> -->
			                        <h3><?php echo $section2_img1_title;?></h3>
			                        <p><?php echo $section2_img1_description;?></p>
			                        <h5>£<?php echo $section2_img1_price;?></h5>
			                    </div>
			                </div>
			                <div class="col-sm-3 col-12">
			                    <div class="section2-box">
									<a data-fancybox="gallery" href="assets/images2/<?php echo $section2_img2_image_name;?>">
										<img src="assets/images2/<?php echo $section2_img2_image_name;?>" class="img-fluid" alt="img"  height="222" width="222">
									</a>
			                    	<!-- <img src="assets/images2/<?php echo $section2_img2_image_name;?>" class="img-fluid" alt="img"  height="222" width="222"/> -->
			                    	<h3><?php echo $section2_img2_title;?></h3>
			                        <p><?php echo $section2_img2_description;?></p>
			                        <h5>£<?php echo $section2_img2_price;?></h5>
			                    </div>
			                </div>
			                <div class="col-sm-3 col-12">
			                    <div class="section2-box">
			                    	<a data-fancybox="gallery" href="assets/images2/<?php echo $section2_img3_image_name;?>">
										<img src="assets/images2/<?php echo $section2_img3_image_name;?>" class="img-fluid" alt="img"  height="222" width="222">
									</a>
			                    	<!-- <img src="assets/images2/<?php echo $section2_img3_image_name;?>" class="img-fluid" alt="img"  height="222" width="222"/> -->
			                    	<h3><?php echo $section2_img3_title;?></h3>
			                        <p><?php echo $section2_img3_description;?></p>
			                        <h5>£<?php echo $section2_img3_price;?></h5>
			                    </div>
			                </div>
			                <div class="col-sm-3 col-12">
			                    <div class="section2-box">
			                    	<a data-fancybox="gallery" href="assets/images2/<?php echo $section2_img4_image_name;?>">
										<img src="assets/images2/<?php echo $section2_img4_image_name;?>" class="img-fluid" alt="img"  height="222" width="222">
									</a>
			                    	<!-- <img src="assets/images2/<?php echo $section2_img4_image_name;?>" class="img-fluid" alt="img"  height="222" width="222"/> -->
			                    	<h3><?php echo $section2_img4_title;?></h3>
			                        <p><?php echo $section2_img4_description;?></p>
			                        <h5>£<?php echo $section2_img4_price;?></h5>
			                    </div>
			                </div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Section 2 Ends -->

		    <!-- Section 3 Starts -->
		    <section>
		    	<div class="section3">
		        	<div class="container-fluid p-0">
			            <div class="row">
			                <div class="col-sm-5 col-12">
			                    <div class="section3-left">
			                    	<img src="assets/images2/<?php echo $section3_img_image_name;?>" class="img-fluid" alt="img" />
			                    </div>
			                </div>
			                <div class="col-sm-7 col-12">
			                    <div class="section3-right">
			                    	<p><?php echo $section3_p1_name;?></p>
									<p><?php echo $section3_p2_name;?></p>
			                    </div>
			                </div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Section 3 Ends -->

		    <!-- Section 4 Starts -->
		    <style type="text/css">
		    	.section4 {
				  padding: 20px;
				  background-color: #fff;
				  background-image: url(assets/images2/<?php echo $section4_img_bg_image_name;?>);
				  background-size: cover;
				  background-position: top left;
				}
		    </style>
		    <section>
		    	<div class="container-fluid p-0">
		    		<div class="section4">
			            <div class="row">
			                <div class="col-sm-6 col-12">
			                    <div class="section4-left">
			                        <h2><?php echo $section4_h2_name;?></h2>
			                        <h3><?php echo $section4_h3_name;?></h3>
			                        <p><?php echo $section4_p1_name;?></p>
			                        <a href="/" class="custom-btn"><?php echo $section4_a_name;?></a>
			                    </div>
			                </div>
			                <div class="col-sm-6 col-12">
			                    <div class="section4-right">
			                    	<img src="assets/images2/<?php echo $section4_img_image_name;?>" class="img-fluid" alt="img" />
			                    </div>
			                </div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Section 4 Ends -->

		    <!-- Section 5 Starts -->
		    <section>
		    	<div class="section5">
		        	<div class="container-fluid p-0">
		        		<div class="row">
		        			<div class="col-sm-12 col-12">
		        				<div class="section5-heading">
		        					<h2><?php echo $section5_h2_name;?></h2>
		        					<p><?php echo $section5_p1_name;?></p>
		        				</div>
		        			</div>
		        		</div>

			            <div class="row">
			                <div class="col-sm-4 col-12">
			                    <div class="section5-box text-left">
			                        <img src="assets/images2/<?php echo $section5_img1_image_name;?>" class="img-fluid" alt="img" />
			                    </div>
			                </div>
			                <div class="col-sm-4 col-12">
			                    <div class="section5-box text-center">
			                    	<img src="assets/images2/<?php echo $section5_img2_image_name;?>" class="img-fluid" alt="img" />
			                    </div>
			                </div>
			                <div class="col-sm-4 col-12">
			                    <div class="section5-box text-right">
			                    	<img src="assets/images2/<?php echo $section5_img3_image_name;?>" class="img-fluid" alt="img" />
			                    </div>
			                </div>
			            </div>

			            <div class="row">
			            	<div class="col">
			            		<div class="section5-btn">
			            			<a href="/" class="custom-btn2"><?php echo $section5_a_name;?></a>
			            		</div>
			            	</div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Section 5 Ends -->

		    <!-- Section 6 Starts -->
		    <style type="text/css">
		    	.section6 {
				  padding: 80px;
				  background-color: #fff;
				  background-image: url(assets/images2/<?php echo $section6_img_image_name;?>);
				  background-size: cover;
				  background-position: top center;
				  display: flex;
				  flex-wrap: wrap;
				  align-content: center;
				}
		    </style>
		    <section>
		    	<div class="container-fluid p-0">
		    		<div class="section6">
			            <div class="row">
			                <div class="col-sm-12 col-12">
			                    <div class="section6-left">
			                        <h3><?php echo $section6_h3_name;?> <img src="assets/images2/right-arrow.png" class="img-fluid" alt="img" /></h3>
			                    </div>
			                </div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Section 6 Ends -->


		    <!-- Section 7 Starts -->
		    <section>
		    	<div class="container-fluid">
		    		<div class="section7">
		        		<div class="row">
		        			<div class="col-sm-12 col-12">
		        				<div class="section7-heading">
		        					<h2><?php echo $section7_h2_name;?></h2>
		        				</div>
		        			</div>
		        		</div>

			            <div class="row">
			                <div class="instagram-section">
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img1_image_name;?>" class="img-fluid 1" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img2_image_name;?>" class="img-fluid 2" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img3_image_name;?>" class="img-fluid 3" alt="img" />
			                	</div> 
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img4_image_name;?>" class="img-fluid 4" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img5_image_name;?>" class="img-fluid 5" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img6_image_name;?>" class="img-fluid 6" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img7_image_name;?>" class="img-fluid 7" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img8_image_name;?>" class="img-fluid 8" alt="img" />
			                	</div>
			                	<!-- <div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img9_image_name;?>" class="img-fluid 9" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img10_image_name;?>" class="img-fluid 10" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img11_image_name;?>" class="img-fluid 11" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img12_image_name;?>" class="img-fluid 12" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img13_image_name;?>" class="img-fluid 13" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img14_image_name;?>" class="img-fluid 14" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img15_image_name;?>" class="img-fluid 15" alt="img" />
			                	</div>
			                	<div class="instagram-images">
			                		<img src="assets/images2/<?php echo $section7_img16_image_name;?>" class="img-fluid 16" alt="img" />
			                	</div> -->
			                </div>
			            </div>
		        	</div>
		        </div>
		    </section>
		    <!-- Section 7 Ends -->

		</main>

	    <footer>
	    	<div class="footer-section">
	    		<div class="container">
		    		<div class="row">
		    			<div class="col-sm-3 col-12">
		    				<div class="first-box">
			    				<ul>
			    					<li><a href="aboutus.php">About Us</a></li>
			    					<li><a href="/">Delivery & Returns</a></li>
			    					<li><a href="/">Privacy Policy</a></li>
			    					<li><a href="/">Terms & Conditions</a></li>
			    					<li><a href="">certification</a></li>
			    				</ul>
		    				</div>
		    			</div>
		    			<div class="col-sm-5 col-12">
		    				<div class="row">
		    					<div class="col-sm-3 col-3 b-right">
		    						<div class="middle-box">
		    							<img src="assets/images2/footer-icon1.png" class="img-fluid" alt="img" />
		    							<p>Gluten Free</p>
		    						</div>
		    					</div>
		    					<div class="col-sm-3 col-3 b-right">
		    						<div class="middle-box">
		    							<img src="assets/images2/footer-icon2.png" class="img-fluid" alt="img" />
		    							<p>alcohol free</p>
		    						</div>
		    					</div>
		    					<div class="col-sm-3 col-3 b-right">
		    						<div class="middle-box">
		    							<img src="assets/images2/footer-icon3.png" class="img-fluid" alt="img" />
		    							<p>for all skin types</p>
		    						</div>
		    					</div>
		    					<div class="col-sm-3 col-3 b-right">
		    						<div class="middle-box">
		    							<img src="assets/images2/footer-icon4.png" class="img-fluid" alt="img" />
		    							<p>Vegan friendly</p>
		    						</div>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="col-sm-4 col-12">
		    				<div class="last-box">
			    				<a href="/">
			    					<img src="assets/images2/social-icon1.png" class="img-fluid" alt="img" />
			    				</a>
			    				<a href="/">
			    					<img src="assets/images2/social-icon2.png" class="img-fluid" alt="img" />
			    				</a>
			    				<a href="/">
			    					<img src="assets/images2/social-icon3.png" class="img-fluid" alt="img" />
			    				</a>
			    				<a href="/">
			    					<img src="assets/images2/social-icon4.png" class="img-fluid" alt="img" />
			    				</a>
			    				<a href="/">
			    					<img src="assets/images2/social-icon5.png" class="img-fluid" alt="img" />
			    				</a>
			    				<a href="/">
			    					<img src="assets/images2/social-icon6.png" class="img-fluid" alt="img" />
			    				</a>
			    				<a href="/">
			    					<img src="assets/images2/social-icon7.png" class="img-fluid" alt="img" />
			    				</a>
			    				<p>Copyright &copy; LONDN</p>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    	</div>
	    </footer>

	    <!-- JavaSrcipts -->

 	    <script src="assets/js2/jquery.min.js"></script>
		<script src="assets/js2/bootstrap.min.js"></script>
	    <!-- <script src="assets/js2/popper.min.js"></script> -->
	    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>

	    <!-- <script src="assets/js2/owl.carousel.js"></script>
	    <script src="assets/js2/aos.js"></script> -->
	    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<!-- 	    <script>
	    	//AOS.init();
	    </script> -->
    </body>
</html>