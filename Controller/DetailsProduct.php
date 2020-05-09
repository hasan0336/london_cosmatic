<?php
session_start();

if(isset($_GET['proid'])){
  echo   $proid=$_GET['proid'];
    $_SESSION['proid']=$proid;
}

header("Location:../products-details.php");

?>