<?php
session_start();
include_once "Model/Db_Connection.php";
include("phpmailer.php");
if(!isset($_POST)){
header("location:".baseUrl."");
}else{
	$db_obj=Db_Connection::db_connect();
	//$oid				= base64_decode($_REQUEST['id']);
	$payment_status 	= $_REQUEST['payment_status'];
	$transaction_id 	= $_REQUEST['txn_id'];
	$payment_amount 	= $_REQUEST['mc_gross'];
	$payment_currency 	= $_REQUEST['mc_currency'];
	$payment_date 		= $_REQUEST['payment_date'];
	$auth_code  		= $_POST['item_number'];

	//$cart="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip'";

	if($payment_status=='Pending'){
		
		$billing_query 		= "UPDATE `order` SET	
												payment_status	= '".$payment_status."',
												status 			= '2' ,
												payment_method 	= 'Paypal',
												mc_currency		= '".$payment_currency."',
												item_number		= '".$auth_code."',
												txn_id			= '".$transaction_id."',
												mc_gross		= '".$payment_amount."',
												payment_date	= '".$payment_date."'
											where 
												order_id 		= ".$_SESSION['order_id'];

														
		
		$result=$db_obj->query($billing_query);
		header('location:'.baseUrl.'thankyou.php');	
		if($result)
		{
			$sql = "SELECT * FROM `order` WHERE order_id=".$_SESSION['order_id'];
			$result1=$db_obj->query($sql);
			$row=$result1->fetch_object();
			//print_r($row->order_id); die();
			$from_mngr 		= "From: info@offtheconner.com<br />";
			$message_user  	= "Hello ".ucfirst($row->fullname).",<br />
								<br /><br />
								Thank you for ordering .<br />
								Your Order details are following. <br />
								<br />
								<br />
								Kind Regards,<br />
								Offtheconner.com <br />
								Technical Support<br />";
							
							
			//@mail($row['email'], 'Order Iformations', addslashes($message_mngr), addslashes($from_mngr));
			
			$mail = new PHPMailer();
			$mail->IsMail();
			$mail->Subject = 'Order Confirmation Email';
			$mail->From = 'info@offtheconner.com';
			$mail->FromName = 'Offtheconner.com';
			$mail->AddReplyTo('Offtheconner.com', $from_mngr);
			$mail->AddAddress('amjad.iub@gmail.com');
			$mail->Body = $message_user;
			$mail->IsHTML(true);
			$mail->Send();
			
			header('location:'.baseUrl.'thankyou.php');		
					
		}
	} 
}

?>