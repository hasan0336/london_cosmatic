<?php
include_once "../Model/Product.php";
 $product=new Product();

 $errors=array();

if (!empty($_POST['action']) && $_POST['action']=='ajax') {
  
    try {
        echo $category_name = $product->getSubCategories($_POST['cat_id'],$_POST['sub_cat_id']);
    } catch (Excepion $ex) {
        $errors['cat_id']=$ex->getMessage();
    } 

}else{

    try {
        $product->product_name=$_POST['pname'];
    } catch (Excepion $ex) {
        $errors['pname']=$ex->getMessage();
    }
    try {
        $product->product_price=$_POST['pprice'];
    } catch (Excepion $ex) {
        $errors['pprice']=$ex->getMessage();
    }
    try {
        $product->product_desction=$_POST['pdes'];
    } catch (Excepion $ex) {
        $errors['pdes']=$ex->getMessage();
    }
    try {
        $product->product_category=$_POST['category'];
    } catch (Excepion $ex) {
        $errors['category']=$ex->getMessage();
    }
    try {
        if ($_POST['subcategory']!='') {
          $product->subcategory=$_POST['subcategory'];
        }else{$product->subcategory=0;}
        
    } catch (Excepion $ex) {
        $errors['subcategory']=$ex->getMessage();
    }
    try {
        $product->product_size=$_POST['size'];
    } catch (Excepion $ex) {
        $errors['size']=$ex->getMessage();
    }
    try {
        $product->product_color=$_POST['color'];
    } catch (Excepion $ex) {
        $errors['color']=$ex->getMessage();
    }
    try {
        $product->product_style=$_POST['style'];
    } catch (Excepion $ex) {
        $errors['style']=$ex->getMessage();
    }
    try {
        $product->product_brand=$_POST['brand'];
    } catch (Excepion $ex) {
        $errors['brand']=$ex->getMessage();
    }
    try{
         $product->product_image=$_FILES['product_image'];
    } catch (Exception $ex) {
      $errors['product_image']=$ex->getMessage();
    }
    try{
        $product->product_image1=$_FILES['product_image1'];
    } catch (Exception $ex) {
     $errors['product_image1']=$ex->getMessage();
    }
    try{
        $product->product_image2=$_FILES['product_image2'];
    } catch (Exception $ex) {
     $errors['product_image2']=$ex->getMessage();
    }

    // $product->AddProduct();
    if(count($errors)==0)
    {
      $product->AddProduct();

        try {
        $product->upload_product_image($_FILES['product_image']['tmp_name']);
      } catch (Exception $e) {
      $errors['errors']=$e->getMessage();
      }
      try {
         $product->upload_product_image1($_FILES['product_image1']['tmp_name']);
        } catch (Exception $e) {
         $errors['errors']=$e->getMessage();
        }
        try {
          $product->upload_product_image2($_FILES['product_image2']['tmp_name']);
         } catch (Exception $e) {
          $errors['errors']=$e->getMessage();
            }
      header("Location:../admin/addproduct.php");
    }
    else{
     header("Location:../admin/addproduct.php");
    }
}
?>