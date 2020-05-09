<?php
session_start();

include_once "../Model/Db_Connection.php";

if(isset($_GET['commonid'])){
        $commonid=$_GET['commonid'];
}

$obj_db=Db_Connection::db_connect();
$deletepro="DELETE FROM `subcategory` WHERE `sub_cat_id`='$commonid'";

$result=$obj_db->query($deletepro);

header("Location:../admin/subcategory.php");
?>