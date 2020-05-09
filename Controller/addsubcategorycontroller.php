<?php

include_once "../Model/Product.php";

$product=new Product();
$errors=array();

try {
    $product->product_category=$_POST['category'];
} catch (Exception $ex) {
    
    $errors['category']=$ex->getMessage();
}

try {
    $product->subcategory=$_POST['subcategory'];
} catch (Exception $ex) {
    
    $errors['subcategory']=$ex->getMessage();
}



if(count($errors)==0){

    $product->addSubCategory();
    
    header("Location:../admin/subcategory.php");
}
else{
    header("Location:../admin/subcategory.php");
}


?>