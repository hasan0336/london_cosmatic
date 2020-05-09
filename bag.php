<?php  
session_start();
include_once "View/top_file.php";
include_once "Model/showprodctdetailscart.php";
include_once "Model/Product.php";
  include_once "Model/Db_Connection.php";
include_once "getip.php";

?>
</head>
<body>
<?php 
include_once "View/header.php";

?>
<style type="text/css">
  ul.breadcrumb li:last-child:after{border:0;}
</style> 
<div class="container">
<ul class="breadcrumb">
  <li><a href="index11.php">Home</a></li>
  <li><a href="bag.php">Bag</a></li>
</ul>
</div>

<div class="container">

<div class="header-progress-container">
    <ol class="header-progress-list">
      <li class="header-progress-item done">Your Bag</li>
   <li class="header-progress-item todo">Checkout</li>
   <li class="header-progress-item todo">Confirm</li>
    </ol>
  </div>

    <div class="row bag-content">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="container">
                        <div class="row" style="padding: 10px;">
                            <div class="col-sm-6">
                                <h2 class="mybg" id="bagRefresh">My Bag  (<?php 
                                            $cip=get_client_ip();
                                        $obj_db=Db_Connection::db_connect();

                                        $cart="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip'"; 
                                        
                                         $result=$obj_db->query($cart);
                                        
                                        
                                         
                                         $countitems=mysqli_num_rows($result);
                                        if($countitems>0){
                                            echo $countitems;
                                        }
                                           ?>)</h2>

                                <div class="cartProducts" id="cartProducts">
                                <?php 
                                        
                                        $bag=new MyBag();
                                        $prodetails=new Product();
                                        $newdata=$bag->ShowBag();
                                        //$allprice=$prodetails->Allprice();
                                        foreach ($newdata as $key => $d) {
                                            
                                      
                                        ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                            <img src="Product/<?php echo $d->product_name ;?>/<?php echo $d->product_image;?>" width="100%" height="90%">
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="RM600"><span>&#163;</span> <?php echo $d->product_price;?>.00</p>
                                        
                                        <p><?php echo $d->product_name;?></p>
                                        <p>Size  &nbsp;&nbsp; Qty:<img id="minus" class="minus" data-minus_id="<?php echo $key;?>" src="assets/img/down.png" style="width: 3%;">

                                        <input type="text" min="1" name="quantity" class="input-count" style="border:none !important;" value="<?php echo $d->quntity;?>" id="quantity<?php echo $key;?>" readonly="">

                                        <img id="add"  class="add" data-add_id="<?php echo $key;?>" src="assets/img/up.png" style="width: 3%;"></p>

                                        <!-- <a href="javascript:" class="update" data-update="<?php echo $key;?>"><i class="fas fa-sync-alt" ></i></a> -->
                                        <!-- <a href="Controller/updatecart.php?proid=<?php echo $d->proid;?>"><i class="fas fa-sync-alt"></i></a> -->
                                        <a href="Controller/deletecart.php?proid=<?php echo $d->proid;?>"><img data-id="42_$product_name" class="cart_delete" src="assets/img/trash.png"></a>
                                        <input type="hidden" name="pro_id" id="pro_id<?php echo $key;?>" value="<?php echo $d->proid;?>">
                                    
                                    </div>

                                </div>
                                <hr>
                                        <?php }?>
                                </div>

                        <!-- Menu Area Start --
                        <div class="col-12"> 
                            <ul class="navbar-nav display-vertical left-margin">
                                <!--<li class="nav-item pad-5-10">--
                                <!--    <a href="#"><img class="payment-logos" src="assets/img/Visa-dark.png"></a>--
                                <!--</li>--
                                <li class="nav-item pad-5-10">
                                    <a href="#"><img class="payment-logos" src="assets/img/MasterCard-dark.png"></a>
                                </li>
                                <!--<li class="nav-item pad-5-10">--
                                <!--    <a href="#"><img class="payment-logos" src="assets/img/Maestro-dark.png"></a>--
                                <!--</li>-
                                <li class="nav-item pad-5-10">
                                    <a href="#"><img class="payment-logos" src="assets/img/Paypal-dark.png"></a>
                                </li>
                            </ul>
                        </div> -->
                              <?php
                              $pr=new Product();
                              $pri=$pr->Allprice();
                              //print_r($pri);
                              ?>
                            </div>
                            <div class="col-sm-6">
                                <h2 class="mybg">Sub-total <span class="total-cost right"><span class="total-cost right"><span>&#163;</span> <?php echo $pri->subtotalprice;?>.00</span></span></h2>
                                <p class="mybg">Delivery Charges<span class="subtotal-cost right"><span class="subtotal-cost right">£<?php echo $pri->charges;?>.00</span></span></p>
                                <h2 class="mybg">Total <span class="total-cost right"><span class="total-cost right"><span>&#163;</span> <?php echo $pri->totalprice;?>.00</span></span></h2>
                                <br>
                                <?php
                                if($d->proid>0){
                                    
                                
                                
                                ?>
                                <a href="checkout.php" class="cont-shop"><button class="Checkout">CHECKOUT</button></a>
                                <?php
                                
                                
                                    
                                    
                                }
                                   
                                ?>
                                <br>
                                <a href="index11.php" class="cont-shop">CONTINUE SHOPPING</a>
                            </div>
                            <!--<div class="col-sm-2" id="subtotalandtotal">
                                <h4 class="bag-total">£ 00.00</h4>
                                <span>£ 00.00</span>
                            </div>-->
                        </div>
                </div>
            </div>
        </div>
    </div> 





              <br><br>

</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function(){
      $(".add").click(function(){
        var index = $(this).data("add_id");
        var val = parseInt($('#quantity'+index).val());
        if ( val < 0 ) $('3quantity'+index).val(val=0);
        $('#quantity'+index).val(val+1);

        var quantity = parseInt($('#quantity'+index).val());
        var proid = $("#pro_id"+index).val();
        
        if (quantity > 0) {
          $("#subcategory_div").show();
          $.ajax({
            url: "Controller/updatecart.php",
            type: "POST",
            data: {
              product_id: proid,qty:quantity,action:'update_cart'
            },
            cache: false,
            success: function(dataResult){
              console.log(dataResult);
              location.reload();
              
            }
          });
        }
        
      });
      $(".minus").click(function(){
        var index = $(this).data("minus_id");

        var val = parseInt($('#quantity'+index).val());
        if ( val < 1 ) $('#quantity'+index).val(val=1);
        if ( val == 1 ) return;
        $('#quantity'+index).val(val-1);
        var quantity = parseInt($('#quantity'+index).val());
        var proid = $("#pro_id"+index).val();
        
        if (quantity > 0) {
          $("#subcategory_div").show();
          $.ajax({
            url: "Controller/updatecart.php",
            type: "POST",
            data: {
              product_id: proid,qty:quantity,action:'update_cart'
            },
            cache: false,
            success: function(dataResult){
              console.log(dataResult);
              location.reload();
              
            }
          });
        }
      });
    });


// $(document).ready(function() {
//   $('.update').on('click', function() {
//       var index = $(this).data("update");
//       var quantity = parseInt($('#quantity'+index).val());
//       var proid = $("#pro_id"+index).val();
      
//       if (quantity > 0) {
//         $("#subcategory_div").show();
//         $.ajax({
//           url: "Controller/updatecart.php",
//           type: "POST",
//           data: {
//             product_id: proid,qty:quantity,action:'update_cart'
//           },
//           cache: false,
//           success: function(dataResult){
//             console.log(dataResult);
//             location.reload();
            
//           }
//         });
//       }
        
//   });
      
// });
</script>
<?php  
    include_once "View/fotter.php";
    include_once "View/bottom_file.php";
?>

</body>
</html>