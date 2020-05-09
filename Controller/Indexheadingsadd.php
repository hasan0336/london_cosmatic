<?php 

include_once "../Model/IndexModel.php";

$errors=array();
$obj=new IndexModel();

if ($_POST['action']=='update_home_page_img_headings') {



    // if($_POST['heading1'] != "" || !empty($_POST['heading1'])){
    // 	$_POST['imagedimension1'] =(float)$_POST['imagedimension1'];
    //   $obj->imagedimension=$_POST['imagedimension1'];

    // }catch(Exception $ex){
    //   $errors['imagedimension1']=$ex->getMessage();
    // }
    if($_POST['heading1'] != "" || !empty($_POST['heading1']))
    {
       	$obj->heading1=$_POST['heading1'];
    }
    else
    {
      	$obj->heading1="";
    }
	if($_POST['heading2'] != "" || !empty($_POST['heading2']))
    {
       	$obj->heading2=$_POST['heading2'];
    }
    else
    {
      	$obj->heading2="";
    }
	if($_POST['heading3'] != "" || !empty($_POST['heading3']))
    {
       	$obj->heading3=$_POST['heading3'];
    }
    else
    {
      	$obj->heading3="";
    }
	if($_POST['heading4'] != "" || !empty($_POST['heading4']))
    {
       	$obj->heading4=$_POST['heading4'];
    }
    else
    {
      	$obj->heading4="";
    }
	if($_POST['heading5'] != "" || !empty($_POST['heading5']))
    {
       	$obj->heading5=$_POST['heading5'];
    }
    else
    {
      	$obj->heading5="";
    }
	if($_POST['heading6'] != "" || !empty($_POST['heading6']))
    {
       	$obj->heading6=$_POST['heading6'];
    }
    else
    {
      	$obj->heading6="";
    }
	if($_POST['paragraph1'] != "" || !empty($_POST['paragraph1']))
    {
       	$obj->paragraph1=$_POST['paragraph1'];
    }
    else
    {
      	$obj->paragraph1="";
    }
	if($_POST['paragraph2'] != "" || !empty($_POST['paragraph2']))
    {
       	$obj->paragraph2=$_POST['paragraph2'];
    }
    else
    {
      	$obj->paragraph2="";
    }
	if($_POST['link1'] != "" || !empty($_POST['link1']))
    {
       	$obj->link1=$_POST['link1'];
    }
    else
    {
      	$obj->link1="";
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

    if($_POST['heading1'] != "" || !empty($_POST['heading1']))
    {
       	$obj->heading1=$_POST['heading1'];
    }
    else
    {
      	$obj->heading1="";
    }
	if($_POST['heading2'] != "" || !empty($_POST['heading2']))
    {
       	$obj->heading2=$_POST['heading2'];
    }
    else
    {
      	$obj->heading2="";
    }
	if($_POST['heading3'] != "" || !empty($_POST['heading3']))
    {
       	$obj->heading3=$_POST['heading3'];
    }
    else
    {
      	$obj->heading3="";
    }
	if($_POST['heading4'] != "" || !empty($_POST['heading4']))
    {
       	$obj->heading4=$_POST['heading4'];
    }
    else
    {
      	$obj->heading4="";
    }
	if($_POST['heading5'] != "" || !empty($_POST['heading5']))
    {
       	$obj->heading5=$_POST['heading5'];
    }
    else
    {
      	$obj->heading5="";
    }
	if($_POST['heading6'] != "" || !empty($_POST['heading6']))
    {
       	$obj->heading6=$_POST['heading6'];
    }
    else
    {
      	$obj->heading6="";
    }
	if($_POST['paragraph1'] != "" || !empty($_POST['paragraph1']))
    {
       	$obj->paragraph1=$_POST['paragraph1'];
    }
    else
    {
      	$obj->paragraph1="";
    }
	if($_POST['paragraph2'] != "" || !empty($_POST['paragraph2']))
    {
       	$obj->paragraph2=$_POST['paragraph2'];
    }
    else
    {
      	$obj->paragraph2="";
    }
	if($_POST['link1'] != "" || !empty($_POST['link1']))
    {
       	$obj->link1=$_POST['link1'];
    }
    else
    {
      	$obj->link1="";
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