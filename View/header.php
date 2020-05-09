<?php 
//session_start();
include_once "Model/Product.php";
include_once "Model/showprodctdetailscart.php";
include_once "Model/Db_Connection.php";
include_once"Model/function.php";
include_once "getip.php";

?>
<style>
.dropbtn {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
    color: black;
    font-size: 16px;
    font-weight: 550;
    padding: 12px 10px 12px 14px !important;
    text-transform: uppercase;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  top: 30px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {
    color: white !important;
    font-weight: 550;
    margin: 5px 0 5px 0;
    background-color: black !important;
    padding: 12px 10px 12px 14px !important;
    text-transform: uppercase;
}
@media(max-width:768px){
	
.dropdown {
  position: relative;
  display: inline-block;
  width:100%;
  float: left;
padding: 10px 0;
}
.collapse ul {
    width: 100%;
    display: table;
    text-align: center;
    margin-top: 15px;
}
.navbar-collapse.in {
    overflow-y: auto;
    z-index: 100;
    background-color: 
    white;
    height: auto;
    padding-bottom: 20px;
}

.btn-group-vertical > .btn-group::after, .btn-group-vertical > .btn-group::before, .btn-toolbar::after, .btn-toolbar::before, .clearfix::after, .clearfix::before, .container-fluid::after, .container-fluid::before, .container::after, .container::before, .dl-horizontal dd::after, .dl-horizontal dd::before, .form-horizontal .form-group::after, .form-horizontal .form-group::before, .modal-footer::after, .modal-footer::before, .modal-header::after, .modal-header::before, .nav::after, .nav::before, .navbar-collapse::after, .navbar-collapse::before, .navbar-header::after, .navbar-header::before, .navbar::after, .navbar::before, .pager::after, .pager::before, .panel-body::after, .panel-body::before, .row::after, .row::before {
    display: table;
    content: inherit !important;
}	
}

@media only screen and (max-width: 600px) {
  .view-bag {
    margin-left:-10px;
    width:100px;
  }
  .check1 {
    width:100px;
  }
  
  .total-price{
    margin-top:-27px;
  }
  .image-header{
    width: 65px;
  }
}

</style>
<header>
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
                   
                        <img src="assets/images2/cart-icon.png" class="img-fluid size-of-bag" alt="img" />
                        <!-- <img src="assets/images2/menu-icon.png" class="img-fluid" alt="img" /> -->
                  </div> 
              </div> 
            </nav>
                    <!-- Modal -->
    		        <a tabindex="0"   data-html="true" data-toggle="popover" data-trigger="focus" data-placement="left" title="" data-content="<div class='box'><h2 class=&quot;mybg&quot;>My Bag  (
            			<?php 
            			  $cip=get_client_ip();
                                $obj_db=Db_Connection::db_connect();
    
                             $cart="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip'"; 
                                
                                 $result=$obj_db->query($cart);
                                
                                
                                 
                                 $countitems=mysqli_num_rows($result);
                                if($countitems>0){
                                    echo $countitems;
                                }
                		   ?>
                		)</h2>
                		<?php 
                		
                		$bag=new MyBag();
                		$newdata=$bag->ShowBag();
                
                		foreach ($newdata as $d) {
                			
                	  
                		?>
    		<div class='row'>
    			<div class='col-sm-5'>
    				<img src='Product/<?php echo $d->product_name;?>/<?php echo $d->product_image;?>'  width='100%' height='auto'>
    			</div>
    			<div class='col-sm-7' style='margin-left:-15px;'>
    			<p class='RM6002'><?php echo $d->product_name;?></p>
    			<p class='RM6002 font-colorWeight'>Qty:&amp;nbsp; <?php echo $d->quntity;?></p>
    			<p class='RM6001'>£<?php echo $d->product_price;?>.00</p>
    			
    			</div>
    		</div>
    		<?php }?>
    		<div class='row totalprice-box'>
    			<div class='col-sm-5'>
    			<p class='RM6001'>Total</p>
    			</div>
    			<?php
    						$pr=new Product();
    						$pri=$pr->Allprice();
    						
    						?>
    			<div class='col-sm-7'>
    			<p class='right RM6001 total-price'>£<?php echo $pri->totalprice;?>.00</p><br>
    			</div>
    		</div>
    		<div class='row'>
    			<div class='col-sm-6'>
    			<a href='bag.php'><div class='view-bag'>VIEW BAG</div></a>
    			</div>
    			<div class='col-sm-6'>
    			<?php
    			if($pri->totalprice>0){
    			    
    			
    			?>
    			<a href='checkout.php'><div class='check1'>CHECKOUT</div></a>
    			<?php  } ?>
    			</div>
    		</div></div>" id="chaticon" data-original-title="">
              
                 <!-- <span class="notify-badge" id="shoppingCartBadge" style=" font-size:15px;padding:8px;">
                            <?php 
                                    $cip=get_client_ip();
                                    $obj_db=Db_Connection::db_connect();

                                    $cart="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip'"; 
                                    
                                     $result=$obj_db->query($cart);
                                    
                                    
                                     
                                     $countitems=mysqli_num_rows($result);

                                  if($countitems>0){
                                        echo $countitems;
                                    }
                    
                //          if(isset($_SESSION['total_product']))
                //             {
                //              echo $_SESSION['total_product'];
                //              }
                           ?>
                </span> -->
    			
    			<!-- <img src="assets/img/cart.png" class="size-of-bag"> -->
                
    	   </a>
    		</li>
    	</ul>
    
    	<!--<ul class="nav navbar-nav navbar-right float-right heart-lock">
    		<li style="margin-right:20px; margin-left:20px;">
    			<a href="#">
    				<span class="notify-badge" id="favBadge">0</span>
    				<img src="assets/img/heart.png" class="size-of-heart" />
    			</a>
    		</li>
    	</ul>-->
                    <!--<form id="search-form" action="serach.php" method="GET" style="">
    
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" name="search" id="searchbarInput" class="form-control input-lg"
                                    placeholder="Search..." required="" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">
                                        <span class="float-right"><img class="float-right"
                                                src="assets/img/searchIcon.png" /></span>
                                    </button>
                                </span>
                            </div>
                        </div>
    
                    </form>-->
                    
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                   
                    <div id="logo" class="text-center">
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</header>
    <!--=========================== bottom-nav=========================== -->
    
<section class="showcase-nav">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-xs">
                <nav class="navbar navbar-expand-lg ">
                	<!--<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation">-->
                	<!--<i class="fa fa-bars" aria-hidden="true"  ></i> Menu-->
                	<!--</button>-->
                	<!-- Menu Area Start -->
                	<div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                		<ul class="navbar-nav" id="yummy-nav" >
                			<?php 
                                $obj= new Product();
                                $cat=$obj->ShowCategory();
                                foreach ($cat as $c) {
                            ?>
                			<div class="dropdown">
                                <a class="dropbtn" href="Controller/SearchProduct.php?category=<?php echo $c->cat_id;?>"><?php echo $c->product_category;?></a>
                                  <div class="dropdown-content">
                                    <?php 
                                        $subCats = $obj->ShowSubCategoryById($c->cat_id);
                                        foreach ($subCats as $subcat) {
                                    ?>
                                    <a href="Controller/SearchProduct.php?category=<?php echo $c->cat_id;?>&subcat=<?php echo $subcat->sub_cat_id;?>"><?php echo $subcat->subcategory;?></a>
                                    <?php } ?>
                                  </div>
                            </div>
                            <?php } ?>
                		</ul>
                	</div>
                </nav>       
            </div>
        </div>
    </div>
</section>
