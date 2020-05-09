<?php
session_start();
include_once "View/top_file.php";
include_once "Model/Product.php";
?>
<?php include_once "View/header.php";?>

<style>
    
    @media only screen and (max-width: 1024px) {
    .add-to-chart {
    font-size:11px;
  }
}


</style>
</head>

<?php
        if(isset($_SESSION['proid'])){
          $proid=$_SESSION['proid'];
        }
        // if(isset($_SESSION['subcat'])){
        //     $subcatid=$_SESSION['subcat'];
        // }
        $prodetails=new Product();
        $pro=$prodetails->DetailsProduct($proid);
       
        //print_r($pro);
    //   if(isset($_SESSION['cat'])){

    //   $proidd=$_SESSION['cat'];

    //   }
        
    //     $pro=$prodetails->SelectCategory($proidd);
       
        //$pro->proid;
       ?>
<style type="text/css">
  ul.breadcrumb li:last-child:after{border:0;}
</style>       
<div class="container">
        <!--<h3 class="listed-menu"><a href="index.php" title="">Home </a> &gt; <a class='' href=""><?php //echo $c->product_category;?></a> &gt; <?php //echo $pro->product_name;?></h3>-->
     <div class="container">
<ul class="breadcrumb">
  <li><a href="index11.php">Home</a></li>
  <li><a href="Controller/SearchProduct.php?category=<?php echo $pro->cat_id;?>"><?php echo $pro->product_category;?></a></li>
  <?php if($pro->sub_cat_id>0){?>
  <li><a href="Controller/SearchProduct.php?category=<?php echo $pro->cat_id;?>&subcat=<?php echo $pro->sub_cat_id;?>"><?php $prodetails->getProdSubCatById($pro->sub_cat_id);?></a></li>
  <?php }?>
  <li><?php echo $pro->product_name;?></li>
</ul>
</div>
       <div class="row">
      
                <div class="col-sm-1">
                  <?php
                  $im=new Product();
                  $images=$im->SubProduct($proid);
                  ?>                <?php
                                    if(strpos($images->product_image1, 'p')){
                                        
                                    
                                    ?>
                                     <img src="SubProduct/<?php echo $pro->product_name ;?>/<?php echo $images->product_image1;?>" class="img-thumbnail img-responsive">
                                    <?php }?>
                                     <br/>
                                     <br/>
                                      <?php
                                    if(strpos($images->product_image2, 'p')){
                                        
                                    
                                    ?>
                                      <img src="SubProduct/<?php echo $pro->product_name ;?>/<?php echo $images->product_image2;?>" class="img-thumbnail img-responsive">
                                      
                                      <br/>
                                     <br/>
                                     <?php }?>
                                      <img src="Product/<?php echo $pro->product_name ;?>/<?php echo $pro->product_image;?>" class="img-thumbnail img-responsive">
                  
                                    
                   
                                  </div>
                <div class="col-sm-4" id="img-container" style="z-index:1;">
                    <img src="Product/<?php echo $pro->product_name ;?>/<?php echo $pro->product_image;?>" class="center-pic img-responsive" id="main-img">
                    <!-- <div id="myresult" style="display: hidden; "></div> -->
                    <!-- <img id="myresult" src="" style="display: none; "> -->
                </div>
                <div class="col-sm-7">
                  
                  <h3 class="product-name-detialsPages"><?php echo $pro->product_name;?>                </h3>
                  <!-- <p class="description">This</p><br> -->
                  <p class="product-desc" id="product-desc">
                  <?php echo $pro->product_desction;?>
                  </p>
                  
                  <h3 class="product-name-detialsPages" id="originalPrice"><span>&#163;</span> <?php echo $pro->product_price;?></h3>
                                                      <input type="hidden" name="p_0" id="p_0" value="270">
                                    <form action="Controller/cart.php" method="post">
                                        
                  <div class="row">
                    <div class="col-sm-8" style="margin-top:60px;">
                      <div class="count"><span style="font-size: 18px;">Quantity</span>
                            <div class="plusmins">
                                <button class="minus-btn" id="minus">-</button>
                                <input type="text" min="1" value="1" name="quantity" id="quantity" class="input-count" readonly="">
                                <button class="plus-btn" id="add">+</button>
                            </div>
                          <input type="hidden"  name="proid" value="<?php echo $pro->proid;?>"/>
                          <input type="submit" class="add-to-chart" style="text-align:center;padding:5px;" value="ADD TO BAG">
                       
                      </div>
                    </div>

                    <br>

                                      
                 
                      <!-- <div class="col-sm-8">
                        <h3 class="product-name">Size</h3>
                          <div class="dropdown wd-58">
                            <button class="drop-down-btn dropdown-toggle listed-menu" type="button" data-toggle="dropdown"><span id="selected_size_id">Select Sizes</span>
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">

                             <li> <?php // echo $pro->product_size;?></li>
                                                         
                            </ul>
                          </div>
                      </div> -->
                       

                 


                    <div class="col-sm-8">
    <div class="callout" id="callout" style="display:none;">
    <button type="button" class="close"><span aria-hidden="true">×</span></button>
    <span class="message"></span>
    </div>
    </div> 
                    <div class="col-sm-8" style="padding-left: 6px;">
                        
                         
<!--                     
                                                      <a href="#" id="m_23" class="heart-det float-right margin-10"> <img src="assets/img/heart.png" title="Add to Favourites">
                          </a>
                                -->
                          
                    </div>
                                        
                  </div>
                  </form>
                  
                </div>

        </div>

          
<div style="margin-top:150px; text-align: center; font-size: 34px">Related Products</div>
   
    

</div>
<?php include_once "View/productslider.php";?>
<?php

include_once "View/fotter.php";
?>
<?php include_once "View/bottom_file.php";?>

    <!--=======================img zoom product detail page ==========================-->
    <!--<script src="assets/js/js-image-zoom.js"></script>-->
    <!-- Or from a CDN -->
    <script src="https://unpkg.com/js-image-zoom/js-image-zoom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-image-zoom/js-image-zoom.min.js"></script>
    <!--=======================img zoom product detail page ==========================-->
<script>
    var options = {
    width: 400, // required
    // more options here
};
new ImageZoom(document.getElementById("img-container"), options);
var options = {
    width: 400, 
    hight: auto
};
var options = {
    width: 400, 
    zoomWidth: auto
};
var options = {
    width: 400, 
    img: '<img src="Product/<?php echo $pro->product_name ;?>/<?php echo $pro->product_image;?>" class="re">'
};
var options = {
    width: 400, 
    offset: {
      vertical: 0,
      horizontal: 10
    }
};
var options = {
    width: 400, 
    scale: 2.5
};
var options = {
    width: 400, 
    zoomContainer: domNode
};
var options = {
    width: 1400, 
    zoomStyle: {
      // your css styles here
    }
};
var options = {
    width: 400, 
    zoomLensStyle: {
      // your css styles here
      
    }
};
var options = {
    width: 400, 
    zoomPosition: 'left'
};

</script>
<script>

  $('#add').click(function(e){
    e.preventDefault();
    var quantity = $('#quantity').val();
    quantity++;
    $('#quantity').val(quantity);
  });
  $('#minus').click(function(e){
    e.preventDefault();
    var quantity = $('#quantity').val();
    if(quantity > 1){
      quantity--;
    }
    $('#quantity').val(quantity);
  });
$(".img-thumbnail").click(function(){
   var subimage1=$(this).attr("src");
  $(".js-image-zoom__zoomed-image").css("background-image","url('"+subimage1+"')");

    $("#main-img").attr("src",subimage1);
   
   
   
   
});
</script>
</body>
</html>