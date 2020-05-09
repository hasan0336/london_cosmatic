<?php

include_once "../Model/Slider.php";

$errors=array();
$obj=new Slider();

if ($_POST['action']=='update_home_page_img_data') {

    try{
      $obj->imagedimension=$_POST['imagedimension1'];
    }catch(Exception $ex){
      $errors['imagedimension1']=$ex->getMessage();
    }

    try{
      $obj->heading=$_POST['heading12'];
    }catch(Exception $ex){
      $errors['heading12']=$ex->getCode();
    }
    try{
      $obj->colorHeadingSlider=$_POST['colorHeadingSlider'];
    }catch(Exception $ex){
      $errors['colorHeadingSlider']=$ex->getCode();
    }
    try{
      $obj->divDim=$_POST['divDim'];
    }catch(Exception $ex){
      $errors['divDim']=$ex->getCode();
    }
    try{
       $obj->description=$_POST['description1'];
    }catch(Exception $ex){
      $errors['description1']=$ex->getMessage();
    }
    try{
       $obj->URL=$_POST['url1'];
    }catch(Exception $ex){
      $errors['url1']=$ex->getMessage();
    }

        //  $idd=$_POST['hidden1'];
        // $obj->UpdateSliderDetails($idd);
    if(count($errors)==0){
      $idd=$_POST['hidden1'];
        $obj->UpdateHomePageImgDetails($idd);
        
     header("Location:../admin/homesetting.php");
    }
    else{
        header("Location:../admin/homesetting.php");
    }

}else{

    try{
      $obj->imagedimension=$_POST['imagedimension1'];
    }catch(Exception $ex){
      $errors['imagedimension1']=$ex->getMessage();
    }

    try{
      $obj->heading=$_POST['heading12'];
    }catch(Exception $ex){
      $errors['heading12']=$ex->getCode();
    }
    try{
      $obj->colorHeadingSlider=$_POST['colorHeadingSlider'];
    }catch(Exception $ex){
      $errors['colorHeadingSlider']=$ex->getCode();
    }
    try{
      $obj->divDim=$_POST['divDim'];
    }catch(Exception $ex){
      $errors['divDim']=$ex->getCode();
    }
    try{
       $obj->description=$_POST['description1'];
    }catch(Exception $ex){
      $errors['description1']=$ex->getMessage();
    }
    try{
       $obj->URL=$_POST['url1'];
    }catch(Exception $ex){
      $errors['url1']=$ex->getMessage();
    }

        //  $idd=$_POST['hidden1'];
        // $obj->UpdateSliderDetails($idd);
    if(count($errors)==0){
      $idd=$_POST['hidden1'];
        $obj->UpdateSliderDetails($idd);
        
     header("Location:../admin/homesetting.php");
    }
    else{
        header("Location:../admin/homesetting.php");
    }

}









?>