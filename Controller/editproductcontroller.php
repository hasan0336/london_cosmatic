<?php
session_start();
if(isset($_GET['productid'])){
       $commonid=$_GET['productid'];
        $_SESSION['commonid']=$commonid;
}


header("Location:../admin/editproduct.php");
?>