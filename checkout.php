<?php  
session_start();
include_once "View/top_file.php";
?>
<style>
    @media only screen and (max-width: 600px) {
  .mybg {
    margin-top:-10px;
    margin-bottom:30px;
  }
  .place-order {
    font-size:12px;
    width:140px;
    text-align:center;
  }
}
</style>
</head>

<body>
  <?php 
  include_once "View/header.php";
  ?>
        <style type="text/css">
            ul.breadcrumb li:last-child:after {
                border: 0;
            }
        </style>
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index11.php">Home</a></li>
                <li><a href="checkout.php">Checkout</a></li>
            </ul>
        </div>

        <div class="container">

            <div class="header-progress-container">
                <ol class="header-progress-list">
                    <li class="header-progress-item done">Your Bag</li>
                    <li class="header-progress-item done">Checkout</li>
                    <li class="header-progress-item todo">Confirm</li>
                </ol>
            </div>

            <div class="row bag-content">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="container">
                            <div class="row" style="padding: 35px;">

                                <div class=" col-md-12">
                                    <h2 class="mybg">Order Summary</h2>
                                    <section>
                                        <br>
                                        <?php 
                                          $bag=new MyBag();
                                          $newdata=$bag->ShowBag();
                                        ?>

                                            <div class="row" id="right123">
                                                <?php foreach ($newdata as $d) {?>
                                                    <div id="line">
                                                        <div class="col-md-3">
                                                            <img src="Product/<?php echo $d->product_name ;?>/<?php echo $d->product_image;?>" width="45%" height="84%" style="padding: 14px;">
                                                        </div>

                                                        <div class="col-md-3" id="one">
                                                            <p>
                                                                <?php echo $d->product_name;?>
                                                                    <span style="font-size: 11px"> (Size:<?php echo $d->product_size;?>)</span>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-2" id="one">
                                                            <p> Price: &#163;
                                                                <?php echo $d->product_price;?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-2" id="one">
                                                            <p> Qty:
                                                                <?php echo $d->quntity;?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-2" id="one">

                                                            <p class="RM600"><span>&#163;</span>
                                                                <?php echo $d->total_amount;?>.00</p>

                                                        </div>
                                                    </div>
                                                    <?php }?>

                                            </div>
                                            <?php
                                              $pr=new Product();
                                              $pri=$pr->Allprice();
                                            ?>
                                                <div class="row">
                                                    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <h2 class="mybg">Sub-Total<span class="subright456 right"><span class="right"><span>&#163;</span><?php echo $pri->subtotalprice;?>.00</span></span></h2>
                                                        <h2 class="mybg">Delivery<span class="subright456 right"><span class="right"><span>&#163;</span> <?php echo $pri->charges;?>.00</span></span></h2>
                                                        <h2 class="mybg">Total <span class="right456 right"><span class="right"><span>&#163;</span> <?php echo $pri->totalprice;?>.00</span></span></h2>
                                                        <a href="bag.php" class="cont-shop">EDIT BAG</a>
                                                    </div>
                                                </div>
                                            <form action="Controller/ordercontroller.php" name="checkoutForm" id="checkoutForm" method="POST">    
                                                <div class="row details-total-mup">
                                                    

                                                        <input type="hidden" name="proid" id="proid" value="<?php echo $d->proid;?>" />
                                                        <input type="hidden" name="qty" id="qty" value="<?php echo $d->quntity;?>" />
                                                        <input type="hidden" name="totalprice" id="totalprice" value="<?php echo $pri->totalprice;?>" />
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <h2>Billing Details</h2>
                                                        <div class="col-sm-8 checkout-form-field">
                                                            <label>Full Name</label>
                                                            <br>

                                                            <input type="text" id="fullname" name="fullname" id="fullname" required="" class="asd">
                                                        </div>
                                                        <div class="col-sm-8 checkout-form-field">
                                                            <label>Email Address</label>
                                                            <br>
                                                            <input type="email" id="email" name="email" id="email" required="" class="asd">
                                                        </div>
                                                        <div class="col-sm-8 checkout-form-field">
                                                            <label>Country</label>
                                                            <br>
                                                            <input type="text" id="country" name="country" id="country" required="" class="asd">
                                                        </div>
                                                        <div class="col-sm-5 checkout-form-field">
                                                            <label>State/City</label>
                                                            <br>
                                                            <input type="text" id="state" name="state" id="state" required="" class="asd">
                                                        </div>
                                                        <div class="col-sm-5 checkout-form-field">
                                                            <label>Zipcode/Postcode</label>
                                                            <br>
                                                            <input type="text" id="zip" name="zip" id="zip" required="" class="asd">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <h2>Billing Method</h2>
                                                        <input type="radio" name="payment_method" id="paypal" value="paypal" checked> PayPal
                                                        <br>
                                                        <br>
                                                        <img src="assets/images/paypal.png" class="responsive" style="width: 100px;">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <input type="radio" name="payment_method" value="creditcard" id="creditcard"> Credit or Debit Card
                                                        <br>
                                                        <br>
                                                        <img src="assets/images/Credit-Cards.png" class="responsive" style="width: 200px;">
                                                        <br>
                                                        <br>
                                                        <br>
                                                    </div>

                                                </div>
                                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                                                    <input class="place-order" type="submit" name="placeOrder" id="place" value="PLACE ORDER">

                                                </div>
                                            </form>    
                                        </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <div class="container">
                <div class="row bottom-heading ">
                    <!--<span class="title left-40">YOU MIGHT ALSO LIKE</span>-->
                    <div class="col-sm-2"></div>

                    <div class="col-sm-2"></div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
        

          <?php  
            include_once "View/fotter.php";
            include_once "View/bottom_file.php";
          ?>
            <!-- <script src="assets/js/gurosoft.js"></script> -->
</body>

</html>