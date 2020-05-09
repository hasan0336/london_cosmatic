<?php

include_once "../Model/Product.php";

$product=new Product();
$errors=array();

try {
    $product->product_color=$_POST['color'];
} catch (Exception $ex) {
    
    $errors['category']=$ex->getMessage();
}



if(count($errors)==0){

    $product->addColor();
    
    header("Location:../admin/addcolor.php");
}
else{
    header("Location:http:../admin/addcolor.php");
}


?>