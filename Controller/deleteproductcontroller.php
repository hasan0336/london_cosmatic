<?php
session_start();

include_once "../Model/Db_Connection.php";

if(isset($_GET['productid'])){
        $commonid=$_GET['productid'];
}

$obj_db=Db_Connection::db_connect();

	$showproduct="SELECT * FROM `products` JOIN `productimages` ON(products.product_id=productimages.project_id) WHERE products.product_id='$commonid'";
    $result=$obj_db->query($showproduct);	
    $row=$result->fetch_object();

    if(!empty($row->product_image)){
    	$str_path="../Product/$row->product_name/$row->product_image";
    	unlink($str_path);
    }
    if(!empty($row->product_img)){
    	$str_path="../SubProduct/$row->product_name/$row->product_img";
    	unlink($str_path);
    }
    if(!empty($row->product_img2)){
    	$str_path="../SubProduct/$row->product_name/$row->product_img2";
    	unlink($str_path);
    }
	$deletepro="DELETE `products` ,`productimages` FROM `products` INNER JOIN `productimages` on(products.product_id=productimages.project_id) WHERE `product_id`='$commonid'";

	$result=$obj_db->query($deletepro);

	header("Location:../admin/showproduct.php");
?>