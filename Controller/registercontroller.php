<?php
include_once "../Model/UserRegister.php";

$obj_user=new Users();

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
    $obj_user->phoneaddress=$_POST['phoneaddress'];
} catch (Exception $ex) {
    $errors['phoneaddress']=$ex->getMessage();
}
try {
    $obj_user->homeaddress=$_POST['homeaddress'];
} catch (Exception $ex) {
    $errors['homeaddress']=$ex->getMessage();
}

try {
    $obj_user->password=$_POST['password'];
} catch (Exception $ex) {
        $errors['password']=$ex->getMessage();
}

$obj_user->AddUser(); 
if(count($errors)==0){
    if(isset($_SESSION['error'])){
        unset($_SESSION['error']);
    }

    try {
        $obj_user->AddUser();   
        header("Location:../login.php");
    } catch (Exception $ex) {

        $errors['adderrro']=$ex->getMessage();
        header("Location:../registor.php");
    }
    
    $_SESSION['msg']="Successfuly Register";

}else{

    $_SESSION['msg']="Please Try Again";
    $_SESSION['error']=$errors;
    $_SESSION['userobjet']=$obj_user;
    header("Location:../registor.php");
}


?>