<?php
include_once "../Model/AdminProfile.php";

$obj_user=new AdminProfile();

$errors=array();
// Customer information

try {
    $obj_user->email=$_POST['email'];
} catch (Exception $ex) {
    $errors['email']=$ex->getMessage();
}
try {
   $obj_user->mail=$_POST['mail'];
} catch (Exception $ex) {
    $errors['mail']=$ex->getMessage();
}

try {
    $obj_user->password=md5($_POST['password']);
} catch (Exception $ex) {
        $errors['password']=$ex->getMessage();
}
try {
    $obj_user->firstname=$_POST['firstname'];
} catch (Exception $ex) {
    $errors['firstname']=$ex->getMessage();
}
try {
    $obj_user->lastname=$_POST['lastname'];
} catch (Exception $ex) {
    $errors['lastname']=$ex->getMessage();
}
try{
    $obj_user->photo=$_FILES['photo'];
} catch (Exception $ex) {
 $errors['photo']=$ex->getMessage();
}
try {
    $obj_user->currentpassword=md5($_POST['currentpassword']);
} catch (Exception $ex) {
    $errors['currentpassword']=$ex->getMessage();
}


//$obj_user->UpdateAdmin(); 
if(count($errors)==0){
   
    if(isset($_SESSION['error'])){
        unset($_SESSION['error']);
    }
    $obj_user->UpdateAdmin(); 
    try {
    $obj_user->upload_photo($_FILES['photo']['tmp_name']);
} catch (Exception $e) {
   echo $errors['errors']=$e->getMessage();
  }
    $_SESSION['msg']="Successfuly Register";
 header("Location:../admin/adminprofile.php");

}else{

    $_SESSION['msg']="Please Try Again";
    $_SESSION['error']=$errors;
    $_SESSION['userobjet']=$obj_user;
   header("Location:../admin/adminprofile.php");
}


?>