<?php

include_once "../Model/Product.php";

$product=new Product();
$errors=array();

try {
    $product->product_category=$_POST['category'];
} catch (Exception $ex) {
    
    $errors['category']=$ex->getMessage();
}



if(count($errors)==0){

    $product->addCategory();
    
    header("Location:../admin/addcategory.php");
}
else{
    header("Location:../admin/addcategory.php");
}


?>