<?php
session_start();

if(isset($_GET['cus_id'])){
    $id=$_GET['cus_id'];
    $_SESSION['cus_id']=$id;
}
header("Location:../admin/customer.php");


?>