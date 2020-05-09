<?php include_once "View/top_file.php";

include_once "Model/Db_Connection.php";
?>


<style>
body{
  overflow-x:hidden;
}

</style>
<link rel="stylesheet" href="View/style.css">
<style>
    
    body{
        overflow-x:hidden!important;
    }
    .carousel-header {
  background:#000;
  color:#fff;
  text-align:center;
  padding:1em 0;
}
</head>
<body>
</style>

<!--Header-->
<style>

</style>
<?php include_once "View/header.php";?>
 
<!--<div style="margin-bottom:30px; "></div>-->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  
  <div class="carousel-inner">
       <?php
   
        $obj_db=Db_Connection::db_connect();
        $selct_slider="select * from `slider`";
        $result=$obj_db->query($selct_slider);
        $rowcount=mysqli_num_rows($result);
        if(!$result){
            echo $obj_db->error;
        }
        for($i=1;$i<=$rowcount;$i++){
             $row=$result->fetch_array();
        ?>
          <?php if($i==1){ 
              $active_class ='active';
            } else{ 
              $active_class ='';
            } ?>
            <div class="item <?php echo $active_class;?>">
              <div class="slidercontant">
                  <h2 style="color: <?php echo $row['colorHeadingSlider'];?>"><?php echo $row['Heading'];?> </h2> 
                  <br />
                  <a href="<?php echo $row['URL'];?>">SHOP NOW</a>
              </div>
              <img src="Slider/<?php echo $row['Photo'];?>" alt="Los Angeles">
              
            </div>
            
           

    
        <?php   } ?>
    <!--<div class="item">-->
    <!--  <img src="assets/slider/S1.jpg" alt="Chicago">-->
    <!--</div>-->

    <!--<div class="item">-->
    <!--  <img src="assets/slider/S31.jpg" alt="New York">-->
    <!--</div>-->
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- <div class="container" style="margin-top:20px;" >
<div class="row">
<div class="col-md-6">
<img src="assets/slider/sub.jpg" class="img img-responsive"/>
</div>
<div class="col-md-6"></div>
</div>
</div> -->

<div class="showcase">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12" style="padding:0px;">
          <div class="hovereffect">
            <?php 
              $sql="select * from `singleimage3` where img_type ='img1'";
              $result=$obj_db->query($sql);
              $rowcount=mysqli_num_rows($result);
              if(!$result){
                  echo $obj_db->error;
              }
              $row1 = $result->fetch_array();
            ?>
            <img class="img-responsive" src="HomePageimages/<?php echo $row1['Photo'];?>" alt="">
            <div class="overlay">
               <a class="info_half" href="<?php echo $row1['URL'];?>" style="color: <?php echo $row1['colorHeadingSlider'];?>"><?php echo $row1['Heading'];?><br>Shop Now !</a>
            </div>
          </div>
      </div>

      <div class="col-md-6">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:0px;">
            <div class="hovereffect">
              <?php 
                $sql="select * from `singleimage3` where img_type ='img2'";
                $result=$obj_db->query($sql);
                $rowcount=mysqli_num_rows($result);
                if(!$result){
                    echo $obj_db->error;
                }
                $row2 = $result->fetch_array();
              ?>
              <img class="img-responsive" src="HomePageimages/<?php echo $row2['Photo'];?>" alt="">
              <div class="overlay">
                 
                 <a class="info_right_half" href="<?php echo $row2['URL'];?>" style="color: <?php echo $row2['colorHeadingSlider'];?>">
                     <?php echo $row2['Heading'];?><br>Shop Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding:0px;">
              <div class="hovereffect">
                <?php 
                  $sql="select * from `singleimage3` where img_type ='img3'";
                  $result=$obj_db->query($sql);
                  $rowcount=mysqli_num_rows($result);
                  if(!$result){
                      echo $obj_db->error;
                  }
                  $row3 = $result->fetch_array();
                ?>
                <img class="img-responsive" src="HomePageimages/<?php echo $row3['Photo'];?>" alt="">
                <div class="overlay">
                   <a class="info_right_half" href="<?php echo $row3['URL'];?>" style="color: <?php echo $row3['colorHeadingSlider'];?>"><?php echo $row3['Heading'];?><br>Shop Now</a>
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <div class="hovereffect">
                  <?php 
                    $sql="select * from `singleimage3` where img_type ='img4'";
                    $result=$obj_db->query($sql);
                    $rowcount=mysqli_num_rows($result);
                    if(!$result){
                        echo $obj_db->error;
                    }
                    $row4 = $result->fetch_array();
                  ?>
                  <img class="img-responsive" src="HomePageimages/<?php echo $row4['Photo'];?>" alt="">
                  <div class="overlay">
                     <a class="info" href="<?php echo $row4['URL'];?>" style="color: <?php echo $row4['colorHeadingSlider'];?>"><?php echo $row4['Heading'];?><br>Shop Now !</a>

                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div style="margin-top:150px; text-align: center; font-size: 34px">Featured Products</div>
       <div class="showcase-slider">
   <div class="container-fluid">
      <div class="row bottom-heading marg_for_bottom_heading ">
         <div class='row'>
      
               <div class="carousel slide media-carousel" id="media">
                  <div class="carousel-inner">
                     <div class="item  active">
                        <div class="row" id="productitem">
                        
                          <?php
                           $db_obj=Db_Connection::db_connect();
                        //   $showproduct="SELECT * FROM `products`";
                        //     $result=$db_obj->query($showproduct);
                        //     $total_product=mysqli_num_rows($result);
                        //      $start=0;
                        //      $limit=8;
                        //     if(isset($_GET['id'])){
                        //         $id=$_GET['id'];
                        //         $start=($id-1)*$limit;
                        //     }else{
                        //         $id=1;
                        //     }
                           
                        //     $page=ceil($total_product/$limit);
                        $start=0;
                             $limit=8;
                             $p=new Product();
                              $pp=$p->GetProduct($start,$limit);
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
                           <br/>
                            
                        </div>
                     </div>
                  </div>
                  

                  
                  
               </div>
               
            </div>
        </div>
    </div>
</div>
    
</div>
</div>

                    <div id="remove" style="margin-top:50px; text-align:center;">
                            <button type="button" class="btn btn-primary loadmore-button" id="loadmore" data-idd="<?php echo $ppp->proid;?>">Load More</button>
                    </div>
                        

<br><br><br><br><br>
<?php include_once "View/fotter.php"?>
<?php include_once "View/bottom_file.php"?>


<script type="text/javascript">
    $(document).on("click","#loadmore",function(event){
        
        event.preventDefault();
        var id=$("#loadmore").data("idd");
        
        $.ajax
        (
        {
            url:"load.php",
            type:"post",
            data:{id:id}
           
            
        }
        ).done(function(response){
           // alert(response);
           $("#remove").remove();
           $("#productitem").append(response);
        });
    
    
        
    });
    
</script>
</body>
</html>
