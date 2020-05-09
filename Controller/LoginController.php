<?php
include_once "../Model/LoginModel.php";

$obj_login=new Login();

$errors=array();
// Customer information
try {
    $obj_login->username=$_POST['email'];
} catch (Exception $ex) {
    $errors['email']=$ex->getMessage();
}
try {
    //print_r(md5($_POST['password'])); 
    $obj_login->password=md5($_POST['password']);
} catch (Exception $ex) {
        $errors['password']=$ex->getMessage();
}


if(count($errors)==0){
    

    try {
        $obj_login->AdminLogin();   
        header("Location:../admin/index1.php");
    } catch (Exception $ex) {

        echo$loginerror=$ex->getMessage();
        header("Location:../admin/index11.php");
    }
    


}else{

    $_SESSION['msg']="Please Try Again";
    header("Location:../admin/index11.php");
}


?>