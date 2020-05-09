<?php
include_once "../Model/Db_Connection.php";
$editor1="";
     $heading=$_POST['heading'];
     $editor1=$_POST['editor1'];
     $hidden=$_POST['hidden'];
$db_obj=DB_Connection::db_connect();
$updatedr="UPDATE `shippingcharge` SET `setamount`='$heading', `charge1`='$editor1',`charge2`='$hidden'";

$result=$db_obj->query($updatedr);
if($result){
    echo "Successfuly Update";
}
?>