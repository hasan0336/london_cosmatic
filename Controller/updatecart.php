<?php
session_start();

include_once "../Model/Db_Connection.php";
include_once "getip.php";
if(isset($_GET['proid'])){
        $proid=$_GET['proid'];
}
$cip=get_client_ip();
$obj_db=Db_Connection::db_connect();
if (!empty($_POST['action']) && $_POST['action']=='update_cart') {
		$product_id = $_POST['product_id'];
		$quantity 	= $_POST['qty'];
		//$cartss="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip' And product_id='$proid'";

		//$results=$obj_db->query($cartss);
	 	//$rows = mysqli_num_rows($results); 
	//if($results){
	    //$data   =  	$results->fetch_array();
	    //$quty   = 	$data['qty'];
	    
	    //if($rows > 0){
	        
	     //$qtty=$quty+1;
	     $cartupdate="UPDATE `shoppingcart` SET `qty`=$quantity Where `ip_add`='$cip' and `product_id`='$product_id'"; 

	    $result1 = $obj_db->query($cartupdate);
	     if(!$result1){
            echo $db_obj->error;
        }
	    
	//}
}

header("Location:../bag.php");
?>