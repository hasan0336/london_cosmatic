<?php
session_start();
include_once "../Model/Db_Connection.php";
include_once "getip.php";
 function items(){
    
    
        
        
                                       $cip=get_client_ip();
                                        $obj_db=Db_Connection::db_connect();

                                        $cart="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip'"; 

                                         $result=$obj_db->query($cart);
                                         $ddd=$result->fetch_array();
                                         
                                         $countitems=mysqli_num_rows($ddd);
  
                                      
    echo $countitmes;
    
    
}
 $qty=$_POST['quantity'];
 $proid=$_POST['proid'];

$cip=get_client_ip();
$obj_db=Db_Connection::db_connect();

$cartss="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip' And product_id='$proid'";
$results=$obj_db->query($cartss);
  $rows = mysqli_num_rows($results); 
if($results){
    $data   =  $results->fetch_array();
    $quty   = $data['qty'];
    
    if($rows > 0){
        
     $qtty=$quty+1;
     $cartupdate="UPDATE `shoppingcart` SET `qty`=$qtty Where `ip_add`='$cip' and `product_id`='$proid'";

     $result1=$obj_db->query($cartupdate);
    
    }else{

        $addnew ="INSERT INTO `shoppingcart` (`ip_add`,`product_id`,`qty`) Values('$cip','$proid','$qty')";
        $result2=$obj_db->query($addnew);
    }
    
}

   

header("Location:../products-details.php");






?>