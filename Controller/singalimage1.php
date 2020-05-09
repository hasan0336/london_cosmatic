<?php

include_once "../Model/SingalImage1.php";

$errors=array();
$obj=new Slider();
try{
   $obj->sliderimage=$_FILES['imagehome'];
}catch(Exception $ex){
  $errors['imagehome']=$ex->getMessage();
}


if(count($errors)==0){
  echo $idd=$_POST['imagehome1'];
    $obj->UpdateSlider($idd);
     try {
    $obj->upload_sliderimage($_FILES['imagehome']['tmp_name']);
  } catch (Exception $e) {
   $errors['errors']=$e->getMessage();
  }
  header("Location:../admin/homesetting.php");
}







?>