<?php
session_start();

if(isset($_GET['mes_id'])){
    $id=$_GET['mes_id'];
    $_SESSION['mes_id']=$id;
}
header("Location:../admin/message.php");


?>