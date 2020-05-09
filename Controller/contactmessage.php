<?php
session_start();
include_once "../Model/ContactMessage.php";

$obj_user=new Message();

$errors=array();
// Customer information
try {
    $obj_user->fullname=$_POST['fullname'];
} catch (Exception $ex) {
    $errors['fullname']=$ex->getMessage();
}
try {
    $obj_user->email=$_POST['email'];
} catch (Exception $ex) {
    $errors['email']=$ex->getMessage();
}
try {
    $obj_user->telephone=$_POST['telephone'];
} catch (Exception $ex) {
    $errors['telephone']=$ex->getMessage();
}
try {
    $obj_user->subject=$_POST['subject'];
} catch (Exception $ex) {
    $errors['subject']=$ex->getMessage();
}

try {
    $obj_user->message=$_POST['message'];
} catch (Exception $ex) {
        $errors['message']=$ex->getMessage();
}

//$obj_user->AddMessage(); 
if(count($errors)==0){
    if(isset($_SESSION['error'])){
        unset($_SESSION['error']);
    }

    try {
        $obj_user->AddMessage();   
        header("Location:../contactus.php");
    } catch (Exception $ex) {

        $errors['adderrro']=$ex->getMessage();
        header("Location:../contactus.php");
    }
    
    $_SESSION['message']="Thanks For Contact ";

}else{

    $_SESSION['message']="Please Try Again";
    $_SESSION['error']=$errors;
    $_SESSION['userobjet']=$obj_user;
    header("Location:../contactus.php");
}


?>