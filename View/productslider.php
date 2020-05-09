<?php include_once "Model/product.php";?>

<div class="showcase-slider">
   <div class="container-fluid">
      <div class="row bottom-heading marg_for_bottom_heading ">
         <div class='row'>
      
               <div class="carousel slide media-carousel" id="media">
                  <div class="carousel-inner">
                     <div class="item  active">
                        <div class="row">
                        
                           <?php
                             $p=new Product();
                              $pp=$p->GetProductTop();
                              foreach($pp as $ppp){
                              
                              ?>  
                              
                           <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                              <div class="imag-div">
                              
                                 <a class="thumbnail " href="Controller/DetailsProduct.php?proid=<?php echo $ppp->proid;?>">
                                 
                                 
                                 <div class=" img-hover-zoom"> 
                                 <img alt="" src="Product/<?php echo $ppp->product_name ;?>/<?php echo $ppp->product_image;?>" class="bottom-slider-image111 img-responsive" ></a></div>
                                    <a href="Controller/DetailsProduct.php?proid=<?php echo $ppp->proid;?>" class="product-name-shop" style="margin-left:79px"><?php echo $ppp->product_name;?></a>
                                 <h3 class="product-name" id="originalPrice"><span>&#163;</span> <?php echo $ppp->product_price;?>
                                                               </div>
                           </div>
                           <?php  } ?>
                        </div>
                     </div>
                  </div>
               </div>
              
            </div>
        </div>
    </div>
</div>



