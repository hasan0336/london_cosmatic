<?php  
include_once "View/top_file.php";
?>
</head>
<body>
<?php 
include_once "View/header.php";
?>

<div class="container">
<ul class="breadcrumb">
  <li><a href="index11.php">Home</a></li>
  <li><a href="collection.php">Collection</a></li>
</ul>
</div>

  <div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="carousel slide media-carousel" id="media">
        <div class="carousel-inner">
          <div class="item  active">
            <div class="row">
                            <?php
                            $p=new Product();
                            $pp=$p->GetProduct();
                            foreach($pp as $ppp){
                            ?>  
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 set-wd-slider-item">
                <div class="imag-div">
                    <a class="thumbnail " href="Controller/DetailsProduct.php?proid=<?php echo $ppp->proid;?>">
                    <img alt="" src="Product/<?php echo $ppp->product_name ;?>/<?php echo $ppp->product_image;?>" class="bottom-slider-image111 img-responsive" ></a>
                </div>
              </div>   
                <?php } ?>
</div>
</div> 
<?php  include_once "View/fotter.php";

include_once "View/bottom_file.php";
?>
</body>
</html>