<?php
session_start();
include_once "../Model/UserRegister.php";

$obj_login=new Users();

$errors=array();
// Customer information
try {
    $obj_login->email=$_POST['email'];
} catch (Exception $ex) {
    $errors['email']=$ex->getMessage();
}
try {
    $obj_login->password=$_POST['password'];
} catch (Exception $ex) {
        $errors['password']=$ex->getMessage();
}


if(count($errors)==0){
    

    try {
        $user=$obj_login->UserLogin();  
        $_SESSION['userid']=$user->user_id;
        $_SESSION['username']=$user->email;
        $_SESSION['password']=$user->password; 
        header("Location:../index11.php");
    } catch (Exception $ex) {

        $loginerror=$ex->getMessage();
        header("Location:../login.php");
    }
    


}else{

    $_SESSION['msg']="Please Try Again";
    header("Location:../login.php");
}


?>