<?php
session_start();

include_once "../Model/Db_Connection.php";
include_once "getip.php";
if(isset($_GET['proid'])){
        $proid=$_GET['proid'];
}
$cip=get_client_ip();
$obj_db=Db_Connection::db_connect();
$deletepro="DELETE FROM `shoppingcart` WHERE `ip_add`='$cip' and `product_id`='$proid'";

$result=$obj_db->query($deletepro);

header("Location:../bag.php");
?>