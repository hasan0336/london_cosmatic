<?php 

include_once "../Model/IndexModel.php";

$errors=array();
$obj=new IndexModel();

if ($_POST['action']=='update_home_page_img_headings') {

	var_dump(888888);
	exit();

    // try{
    // 	$_POST['imagedimension1'] =(float)$_POST['imagedimension1'];
    //   $obj->imagedimension=$_POST['imagedimension1'];

    // }catch(Exception $ex){
    //   $errors['imagedimension1']=$ex->getMessage();
    // }
    try
    {
       	$obj->URL=$_POST['heading1'];
    }
    catch(Exception $ex)
    {
      	$errors['heading1']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading2'];
    }
    catch(Exception $ex)
    {
      	$errors['heading2']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading3'];
    }
    catch(Exception $ex)
    {
      	$errors['heading3']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading4'];
    }
    catch(Exception $ex)
    {
      	$errors['heading4']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading5'];
    }
    catch(Exception $ex)
    {
      	$errors['heading5']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading6'];
    }
    catch(Exception $ex)
    {
      	$errors['heading6']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['paragraph1'];
    }
    catch(Exception $ex)
    {
      	$errors['paragraph1']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['paragraph2'];
    }
    catch(Exception $ex)
    {
      	$errors['paragraph2']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['link1'];
    }
    catch(Exception $ex)
    {
      	$errors['link1']=$ex->getMessage();
    }
    if(count($errors)==0){
      $idd=$_POST['hidden1'];
        $obj->UpdateIndexPageheadings($idd);
        
     header("Location:../admin/EditIndexpage.php");
    }
    else{
        header("Location:../admin/EditIndexpage.php");
    }

}else{

    try
    {
       	$obj->URL=$_POST['heading1'];
    }
    catch(Exception $ex)
    {
      	$errors['heading1']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading2'];
    }
    catch(Exception $ex)
    {
      	$errors['heading2']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading3'];
    }
    catch(Exception $ex)
    {
      	$errors['heading3']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading4'];
    }
    catch(Exception $ex)
    {
      	$errors['heading4']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading5'];
    }
    catch(Exception $ex)
    {
      	$errors['heading5']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['heading6'];
    }
    catch(Exception $ex)
    {
      	$errors['heading6']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['paragraph1'];
    }
    catch(Exception $ex)
    {
      	$errors['paragraph1']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['paragraph2'];
    }
    catch(Exception $ex)
    {
      	$errors['paragraph2']=$ex->getMessage();
    }
	try
    {
       	$obj->URL=$_POST['link1'];
    }
    catch(Exception $ex)
    {
      	$errors['link1']=$ex->getMessage();
    }
    if(count($errors)==0){
      $idd=$_POST['hidden1'];
        $obj->UpdateIndex_headings($idd);
        
     header("Location:../admin/EditIndexpage.php");
    }
    else{
        header("Location:../admin/EditIndexpage.php");
    }

}
?>