<?php
session_start();
include_once "Db_Connection.php";
class Login extends Db_Connection{


    private $username;
    private $password;


    public function __set($name,$value){

        $method_name="set_$name";
        if(!method_exists($this,$method_name)){
            throw new Exception("set_$name is exists");
        }
         $this->$method_name($value);

    }
    //__GET Magix Function
    public function __get($name){
        $method_name="get_$name";
        if(!method_exists($this,$method_name)){
            throw new Exception("get_$name");
        }
        return $this->$method_name();
    }private function set_username($username){
        $reg_username="/^[a-z0-9\@\_\.]+$/i";

        if(!preg_match($reg_username,$username)){
            throw new Exception("Please Enter Username");   
        }
        $this->username=$username;
    }
    private function get_username(){
        return $this->username;
    }
    private function set_password($password){
        $reg_password="/^[a-z0-9\@\_\.!\#\$\%\^\&\*]+$/i";

        if(!preg_match($reg_password,$password)){
            throw new Exception("Please Enter Username");   
        }
        $this->password=$password;
    }
    private function get_password(){
        return $this->password;
    }




    // Login 
    public function AdminLogin(){

        $db_obj=Db_Connection::db_connect();
        
        $login="SELECT * FROM `admin` where `admin_username`='$this->username' AND `admin_password`='$this->password'";
        // var_dump($login);
        // exit();
        //Query RUn
        $result=$db_obj->query($login);

        if($result->num_rows==0){

            throw new Exception("Login Failed");
            
        }
        if($result){

            $_SESSION['username']=$this->username;
            $_SESSION['password']=$this->password;
        }

    }
}


?>