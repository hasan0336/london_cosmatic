<?php

include_once "../Model/Product.php";

$product=new Product();
$errors=array();

try {
    $product->product_brand=$_POST['brand'];
} catch (Exception $ex) {
    
    $errors['brand']=$ex->getMessage();
}



if(count($errors)==0){

    $product->addBrand();
    
    header("Location:../admin/addbrand.php");
}
else{
    header("Location:../admin/addbrand.php");
}


?>