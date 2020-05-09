<?php
include_once "../Model/Product.php";

$products=new Product();

$errors = array();


try {
    $products->product_name=$_POST['pname'];
}catch (Exception $ex) {
   $errors['pname']=$ex->getMessage();
}
try {
    $products->product_price=$_POST['pprice'];
} catch (Exception $ex) {
    $errors['pprice']=$ex->getMessage();
}
try {
    $products->product_desction=$_POST['pdes'];
} catch (Exception $ex) {
    $errors['pdes']=$ex->getMessage();
}
try {
    $products->product_category=$_POST['category'];
} catch (Exception $ex) {
    $errors['category']=$ex->getMessage();
}
try {
    
    if (!empty($_POST['subcategory'])) {
      $products->subcategory=$_POST['subcategory'];
    }else{$products->subcategory=0;}
    
} catch (Excepion $ex) {
    $errors['subcategory']=$ex->getMessage();
}
try {
    $products->product_size=$_POST['size'];
} catch (Exception $ex) {
    $errors['size']=$ex->getMessage();
}
try {
    $products->product_color=$_POST['color'];
} catch (Exception $ex) {
    $errors['color']=$ex->getMessage();
}
try {
   $products->product_style=$_POST['style'];
} catch (Exception $ex) {
   $errors['style']=$ex->getMessage();
}
try {
    $products->product_brand=$_POST['brand'];
} catch (Exception $ex) {
    $errors['brand']=$ex->getMessage();
}
try{

    if (!empty($_FILES['product_image']['name'])) {
        $products->product_image=$_FILES['product_image'];
    }else{
        $products->product_image='';
    }
     
} catch (Exception $ex) {
  $errors['product_image']=$ex->getMessage();
}
try{
    if (!empty($_FILES['product_image1']['name'])) {
     $products->product_image1=$_FILES['product_image1'];
    }else{
      $products->product_image1='';
    }
} catch (Exception $ex) {
  $errors['product_image']=$ex->getMessage();
}
try{
    if (!empty($_FILES['product_image2']['name'])) {
      $products->product_image2=$_FILES['product_image2'];
    }else{
      $products->product_image2='';
    }
} catch (Exception $ex) {
  $errors['product_image']=$ex->getMessage();
}

    // $upid=$_POST['hiddenid'];
    // $products->UpdateProduct($upid);
if(count($errors)==0)
{
    $upid=$_POST['hiddenid'];
    $products->UpdateProduct($upid);

    try {
      if (!empty($_FILES['product_image']['name'])) {
        $products->upload_product_image($_FILES['product_image']['tmp_name']);
      }
  } catch (Exception $e) {
      $errors['errors']=$e->getMessage();
  }
    try {
      if (!empty($_FILES['product_image1']['name'])) {
        $products->upload_product_image1($_FILES['product_image1']['tmp_name']);
      }
  } catch (Exception $e) {
     $errors['errors']=$e->getMessage();
  }
    try {
      if (!empty($_FILES['product_image2']['name'])) {
        $products->upload_product_image2($_FILES['product_image2']['tmp_name']);
      }
  } catch (Exception $e) {
     $errors['errors']=$e->getMessage();
  }
 header("Location:../admin/showproduct.php");
}
else{
 header("Location:../admin/editproduct.php");
}
?>