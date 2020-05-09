<?php

include_once "../Model/Product.php";

$product=new Product();
$errors=array();

try {
   $product->product_style=$_POST['style'];
} catch (Exception $ex) {
    
    $errors['style']=$ex->getMessage();
}



if(count($errors)==0){

    $product->addStyle();
    
    header("Location:../admin/addstyle.php");
}
else{
    header("Location:../admin/addstyle.php");
}


?>