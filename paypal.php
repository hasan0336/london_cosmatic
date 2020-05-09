<?php sessison_start();?>
<div class="container margin_60">
        <div class="main_title">
            
           
         
           
        </div>
        <div class="row">
            
           <div class="col-md-6">
               
                <!--sb-yjbcv25803@business.example.com-->
                <!--https://www.paypal.com/cgi-bin/webscr-->
              
                <!--https://www.sandbox.paypal.com/-->
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="airportextrasuk@gmail.com" />
<input type="hidden" name="amount" value="<?=$grand_total?>" placeholder="Enter Your Amount" required="" />
<input type="hidden" name="currency_code" value="GBP" />
<input type="hidden" name="return" value="https://airportextrasuk.co.uk/success">    
<!-- Enable override of buyers's address stored with PayPal . -->
<!-- Set variables that override the address stored with PayPal. -->
<center><input type="submit" name="submit" value="Pay Now" class="btn btn-info" /></center></form>
                
                
            </div>
            
            <div class="col-md-6">
                <center><img src="img/stripe.png" width="200"></center><br>
                
    <center>            
    <form style="margin-left:40px;" action="charge" method="POST">
<input type="hidden" name="totalprice" value="<?= $grand_total ?>" />
<!--//pk_live_fG2xTxUhOeOg9mZdWKok5OFG00sUD4mnw1-->
<!--pk_test_UTiX0w0lxuv0GH9zw7qk68sZ00aHrxMlno-->
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_live_fG2xTxUhOeOg9mZdWKok5OFG00sUD4mnw1" // your publishable keys
    data-image="img/Logo-01.png" // your company Logo
    data-name="Payment"
    data-currency="gbp"
    data-description="Description"
    data-amount="<?php echo $grand_total * 100; ?>">
  </script>
</form>
   </center> 
    

                
                
            </div>
   
<!--   
    <div class="col-md-12">
       <center> <img src="img/rsz_payzone-uk-logo.jpg"></center>
               
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post"><input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="support@jarrettsdrivingschool.com" />
<input type="hidden" name="amount" value="$grand_total" placeholder="Enter Your Amount" required="" />
<input type="hidden" name="currency_code" value="GBP" />
<!-- Enable override of buyers's address stored with PayPal . -->
<!-- Set variables that override the address stored with PayPal. 
<center><input type="submit" name="submit" value="Pay Now" class="btn btn-info" /></center></form>
                
                
            </div>-->
   
   
   
        </div><!-- End Row -->

        
        
        <div id="weather" class="clearfix"></div><!-- Weather widget -->
    </div><!-- End Container -->
        