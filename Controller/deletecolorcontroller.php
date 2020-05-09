<?php
session_start();

include_once "../Model/Db_Connection.php";

if(isset($_GET['commonid'])){
        $commonid=$_GET['commonid'];
}

$obj_db=Db_Connection::db_connect();
$deletepro="DELETE FROM `color` WHERE `color_id`='$commonid'";

$result=$obj_db->query($deletepro);

header("Location:../admin/addcolor.php");
?>