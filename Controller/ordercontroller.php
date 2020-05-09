<?php  
session_start();
include_once "../Model/Db_Connection.php";

	//print_r($_POST); die();
if ($_POST['payment_method']=='paypal') {

	 $fullname 			= $_POST['fullname'];
	 $email 			= $_POST['email'];
	 $country			= $_POST['country'];
	 $state				= $_POST['state'];
	 $zip				= $_POST['zip'];
	 $proid 			= $_POST['proid'];
	 $qty 				= $_POST['qty'];
	 $totalprice 		= $_POST['totalprice'];
	 $payment_method 	= $_POST['payment_method'];
    
    if(!empty($payment_method) &&  $payment_method=='paypal'){

    	foreach ($_POST as $key => $value) {
    		$_SESSION[$key] = $_POST[$key];
    	}
    	
    	$db_obj=Db_Connection::db_connect();
		$cust="INSERT INTO `users`(`fullname`,`email`,`country`,`state`,`zip`) VALUES('$fullname','$email','$country','$state','$zip')";     
		$result1=$db_obj->query($cust);

		if($result1){
		     $id=$db_obj->insert_id;
		   	$insertorder="INSERT INTO `order`(`fullname`,`user_id`,`email`,`address`,`product_id`,`total`,`qty`,`payment_method`) VALUES('$fullname','$id','$email','$state','$proid','$totalprice','$qty','$payment_method')";
		   $result=$db_obj->query($insertorder);
		   $_SESSION['order_id'] =$db_obj->insert_id;

		   header('location:'.baseUrl.'midway-paypal.php');
		}else{
		    echo "sorry";
		}
	}else{
    	echo "Please Fill All feild";
	}
}else{

	header('location:'.baseUrl);
}
?>