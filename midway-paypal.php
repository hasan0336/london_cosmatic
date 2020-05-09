<?php  
session_start();
include_once "Model/Db_Connection.php";
$pay            = 'document.getElementById("paypal").submit();';
$fullname       = $_SESSION['fullname'];
$email          = $_SESSION['email'];
//$country        = $_SESSION['country'];
//$state          = $_SESSION['state'];
//$zip            = $_SESSION['zip'];
//$proid          = $_SESSION['proid'];
//$qty            = $_SESSION['qty'];
$totalprice     = $_SESSION['totalprice'];
//$payment_method = $_SESSION['payment_method'];
$order_id       = $_SESSION['order_id'];

?>
<?php
    $db_obj=DB_Connection::db_connect();
    $footerpage="SELECT * FROM `paypal`";
    $result=$db_obj->query($footerpage);
    while ($row=$result->fetch_array()) {
      $heading=$row['paypal_email'];
    }
    //norishkareemcouture@gmail.com
?>
<center>
    <h1>Redirecting To Paypal...</h1><br>
    <img  src="<?php echo baseUrl;?>assets/images/progress.gif" />
    <form action="<?php echo PAYPAL_URL; ?>" method="post" name="paypal" id="paypal">

        <input name="cmd" type="hidden" id="cmd" value="_xclick" />
        <input name="business" type="hidden" id="business" value="<?php echo $heading;?>" />
        <input name="item_name" type="hidden" id="item_name" value="Off The Cornner" />
        <input type="hidden" name="TOKEN" value="AJj_NMc1xmhKzEoDtyjCGdAabXHb68tbsUk7B4u8UqCyzBMkBtZM15tJhDy">
        <input name="email" type="hidden" id="email" value="<?php echo $email;?>" />
        <input name="item_number" type="hidden" id="item_number" value="<?php echo $order_id;?>" />
        <input name="amount" type="hidden" id="amount3" value="<?php echo $totalprice;?>"  />
        <input name="no_shipping" type="hidden" id="no_shipping" value="1" />
        <input type="hidden" name="rm" value="2">
        <input name="no_note" type="hidden" id="no_note" value="0" />
        <input name="return" type="hidden" id="return" value="<?php echo PAYPAL_RETURN_URL; ?>"/>
        <input name="currency_code" type="hidden" id="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>" />
        <input name="lc" type="hidden" id="lc" value="UK" />
        <input name="bn" type="hidden" id="bn" value="PP-BuyNowBF" />
        <input name="notify_url" type="hidden" id="notify_url" value="<?php echo PAYPAL_CANCEL_URL; ?>" />
        <input type="hidden" name="first_name" class="required" value="<?php echo $fullname;?>"/>
        <input type="hidden" name="last_name" class="required" value="<?php echo $fullname;?>"/>
          
    </form>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        <?php echo $pay;?>
    });
</script>