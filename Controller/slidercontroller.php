<?php

include_once "../Model/Slider.php";

$errors=array();
$obj=new Slider();
try{
   
    if ($_POST['action']=='homeimage3') {
      $obj->imagehome33=$_FILES['imagehome33'];
    }else{
      $obj->sliderimage=$_FILES['imagehome'];
    }
}catch(Exception $ex){
    $errors['imagehome']=$ex->getMessage();
}


if(count($errors)==0){

    // if ($_POST['action']=='homeimage1') {
    //       $idd=$_POST['hidden11'];
    //       $obj->UpdateHomeImage1($idd);
    //     try {
    //       $obj->upload_imagehome($_FILES['imagehome11']['tmp_name']);
    //     } catch (Exception $e) {
    //      $errors['errors']=$e->getMessage();
    //     }
    // }
    // if ($_POST['action']=='homeimage2') {
    //       $idd=$_POST['hidden22'];
    //       $obj->UpdateHomeImage2($idd);
    //     try {
    //       $obj->upload_imagehome2($_FILES['imagehome22']['tmp_name']);
    //     } catch (Exception $e) {
    //      $errors['errors']=$e->getMessage();
    //     }
    // }
    if ($_POST['action']=='homeimage3') {
          $idd=$_POST['hidden33'];
          $obj->UpdateHomeImage3($idd);
        try {
          $obj->upload_imagehome3($_FILES['imagehome33']['tmp_name']);
        } catch (Exception $e) {
         $errors['errors']=$e->getMessage();
        }
    }
    // if ($_POST['action']=='homeimage4') {
    //       $idd=$_POST['hidden44'];
    //       $obj->UpdateHomeImage4($idd);
    //     try {
    //       $obj->upload_imagehome4($_FILES['imagehome44']['tmp_name']);
    //     } catch (Exception $e) {
    //      $errors['errors']=$e->getMessage();
    //     }
    // }
    

    $idd=$_POST['imagehome1'];

    $obj->UpdateSlider($idd);
    try {
      $obj->upload_sliderimage($_FILES['imagehome']['tmp_name']);
    } catch (Exception $e) {
     $errors['errors']=$e->getMessage();
    }
    header("Location:../admin/homesetting.php");
}







?>