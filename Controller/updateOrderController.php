<?php  
include_once "../Model/Db_Connection.php";
$obj_db=Db_Connection::db_connect();

if (!empty($_POST['action']) && $_POST['action']!='view_product') {
 	if ($_POST['action']=='update_order_status') {
 		$field ='`oder_status`';
 	}if ($_POST['action']=='update_payment_status') {
 		$field ='`payment_status`';
 	}

		$orderId 		= $_POST['orderId'];
		$svalue 		= $_POST['svalue'];
	    $orderUpdate 	= "UPDATE `order` SET ".$field."='".$svalue."' Where `order_id`=".$orderId; 
	    $result1 = $obj_db->query($orderUpdate);
	    if($result1){
		    if ($svalue=='completed') {
		    	echo 'Completed';
		    }else{
		    	echo 'Pending';
		    }
		}

}
if (!empty($_POST['action']) && $_POST['action']=='view_product') {

	$product_id = $_POST['proid'];
	$orderid 	= $_POST['orderid'];

	$sql= "SELECT order.order_id,order.user_id,order.fullname,order.email,order.address,order.product_id,order.total,order.qty,order.oder_status,order.payment_status,order.sale_date,products.product_name,products.product_size,products.product_price
	FROM `order`
        INNER JOIN `products` ON order.product_id = products.product_id
    WHERE products.product_id =$product_id and order.order_id=$orderid";
    $result=$obj_db->query($sql);

    if(!$result){
       echo "sorry";
    }
    $data =array();
        if($result){
        	$list='';
            $row=$result->fetch_object();
            $list.='<tr class="prepend_items"><td>'.$row->product_name.'</td><td>'.$row->product_size.'</td><td>£'.$row->product_price.'.00</td><td>'.$row->qty.'</td><td>£'.$row->total.'.00</td></tr>';
            
        $data=array(

        	'transaction'=>$row->order_id,
            'list'=>$list,
            'total'=>$row->total,
            'paymentFrom'=>ucfirst($row->fullname),
            'date'=>date('M j, Y',strtotime($row->sale_date))
            
        );
            
        //print_r(json_encode($data)); die();
        print_r(json_encode($data));
        }
}
?>