<?php

include_once "../Model/IndexModel.php";

$errors=array();
$obj=new IndexModel();

if ($_POST['action']=='update_home_page_img_data') {

	// var_dump($_POST['imagedimension1']);
	// exit();

    // try{
    // 	$_POST['imagedimension1'] =(float)$_POST['imagedimension1'];
    //   $obj->imagedimension=$_POST['imagedimension1'];

    // }catch(Exception $ex){
    //   $errors['imagedimension1']=$ex->getMessage();
    // }
     try{
       $obj->URL=$_POST['imagedimension1'];
    }catch(Exception $ex){
      $errors['url1']=$ex->getMessage();
    }

    try{
      $obj->heading=$_POST['heading12'];
    }catch(Exception $ex){
      $errors['heading12']=$ex->getCode();
    }
    try{
       $obj->description=$_POST['description1'];
    }catch(Exception $ex){
      $errors['description1']=$ex->getMessage();
    }
    
    if(count($errors)==0){
      $idd=$_POST['hidden1'];
        $obj->UpdateIndexPageImgDetails($idd);
        
     header("Location:../admin/EditIndexpage.php");
    }
    else{
        header("Location:../admin/EditIndexpage.php");
    }

}else{

    try{
       $obj->URL=$_POST['imagedimension1'];
    }catch(Exception $ex){
      $errors['url1']=$ex->getMessage();
    }

    try{
      $obj->heading=$_POST['heading12'];
    }catch(Exception $ex){
      $errors['heading12']=$ex->getCode();
    }
    try{
       $obj->description=$_POST['description1'];
    }catch(Exception $ex){
      $errors['description1']=$ex->getMessage();
    }
    if(count($errors)==0){
      $idd=$_POST['hidden1'];
        $obj->UpdateIndex_Details($idd);
        
     header("Location:../admin/EditIndexpage.php");
    }
    else{
        header("Location:../admin/EditIndexpage.php");
    }

}












?>