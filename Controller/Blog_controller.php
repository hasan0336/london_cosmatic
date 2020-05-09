<?php
include_once "../Model/Blog_model.php";
 $Blog_model=new Blog_model();

 $errors=array();

if (!empty($_POST['submit'])) 
{
	try {
        $Blog_model->title=$_POST['title'];
    } catch (Excepion $ex) {
        $errors['title']=$ex->getMessage();
    }
    try {
        $Blog_model->description=$_POST['description'];
    } catch (Excepion $ex) {
        $errors['description']=$ex->getMessage();
    }
    try{
         $Blog_model->image_1=$_FILES['image_1'];
    } catch (Exception $ex) {
      $Blog_model->image_1='';
    }
    try{
         $Blog_model->image_2=$_FILES['image_2'];
    } catch (Exception $ex) {
      $Blog_model->image_2='';
    }
    try{
         $Blog_model->image_3=$_FILES['image_3'];
    } catch (Exception $ex) {
      $Blog_model->image_3='';
    }
    try{
         $Blog_model->image_4=$_FILES['image_4'];
    } catch (Exception $ex) {
      $Blog_model->image_4='';
    }
    if(count($errors)==0)
    {
    	$Blog_model->AddBlog();
    	try {
	        $Blog_model->upload_image_1($_FILES['image_1']['tmp_name']);
	    } catch (Exception $e) {
	      $errors['errors']=$e->getMessage();
	    }
	    try {
	        $Blog_model->upload_image_2($_FILES['image_2']['tmp_name']);
	    } catch (Exception $e) {
	      $errors['errors']=$e->getMessage();
	    }
	    try {
	        $Blog_model->upload_image_3($_FILES['image_3']['tmp_name']);
	    } catch (Exception $e) {
	      $errors['errors']=$e->getMessage();
	    }
	    try {
	        $Blog_model->upload_image_4($_FILES['image_4']['tmp_name']);
	    } catch (Exception $e) {
	      $errors['errors']=$e->getMessage();
	    }
	    header("Location:../admin/addBlog.php");
    }
    else
    {
    	header("Location:../admin/addBlog.php");
    }


}
?>