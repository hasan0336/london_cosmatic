<?php
//session_start();
include_once "Db_Connection.php";
class Users extends Db_Connection{

    private $fullname;
    private $email;
    private $phoneaddress;
    private $password;
    private $homeaddress;
    private $user_id;
   


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
    }
    private function set_fullname($fullname){
        $reg_username="/^[a-z\s]+$/i";

        if(!preg_match($reg_username,$fullname)){
            throw new Exception("Please Enter Full Name");   
        }
        $this->fullname=$fullname;
    }
    private function get_fullname(){
        return $this->fullname;
    }
    private function set_email($email){
        $reg_username="/^[a-z0-9\@\_\.]+$/i";

        if(!preg_match($reg_username,$email)){
            throw new Exception("Please Enter Email");   
        }
        $this->email=$email;
    }
    private function get_email(){
        return $this->email;
    }
    private function set_phoneaddress($phoneaddress){
        $reg_username="/^[0-9\+]+$/i";

        if(!preg_match($reg_username,$phoneaddress)){
            throw new Exception("Please Enter Phone");   
        }
        $this->phoneaddress=$phoneaddress;
    }
    private function get_phoneaddress(){
        return $this->phoneaddress;
    }
    private function set_password($password){
        $reg_password="/^[a-z0-9\@\_\.!\#\$\%\^\&\*]+$/i";

        if(!preg_match($reg_password,$password)){
            throw new Exception("Please Enter Username");   
        }
        $this->password=sha1($password);
    }
    private function get_password(){
        return $this->password;
    }
    
    private function set_homeaddress($homeaddress){
        $reg_username="/^[a-z0-9\@\_\.\s]+$/i";

        if(!preg_match($reg_username,$homeaddress)){
            throw new Exception("Please Enter Home Address");   
        }
        $this->homeaddress=$homeaddress;
    }
    private function get_homeaddress(){
        return $this->homeaddress;
    }
    private function get_user_id(){
        return $this->user_id;
    }
    //Register
    public function AddUser(){

        $db_obj=Db_Connection::db_connect();

        $adduser="INSERT INTO `users`(`fullname`, `email`, `phoneadderss`, `homeaddress`, `password`) VALUES ('$this->fullname','$this->email','$this->phoneaddress','$this->homeaddress','$this->password')";
        $result=$db_obj->query($adduser);
        if(!$result){
            throw new Exception("Please Contact with Naveed Ahmad");
            
        }

    }
    // Login 
    public function UserLogin(){

        $db_obj=Db_Connection::db_connect();

        $login="SELECT * FROM `users` where `email`='$this->email' AND `password`='$this->password'";

        //Query RUn
        $result=$db_obj->query($login);

        if($result->num_rows==0){

            throw new Exception("Login Failed");
            
        }
        if($result){

           while ($login=$result->fetch_object()) {
                $this->user_id=$login->user_id;
                $this->email=$login->login;
                $this->password=$login->password;
           }
        }

    }
    public function GetUser(){

        $db_obj=Db_Connection::db_connect();


        $selectuser="SELECT * FROM `users` order by user_id DESC";

        $result=$db_obj->query($selectuser);
        $total_user=mysqli_num_rows($result);
        $_SESSION['total_user']=$total_user;
        $users=array();
        while ($data=$result->fetch_object()) {
            $u=new Users();
            $u->user_id=$data->user_id;
            $u->fullname=$data->fullname;
            $u->email=$data->email;
            $u->phoneaddress=$data->phoneadderss;
            $u->homeaddress=$data->homeaddress;

            $users[]=$u;

        }
        return $users;
    }
    public function DelUser($id){
        $db_obj=Db_Connection::db_connect();

        $deluser="DELETE from `users` where `user_id`='$id'";

        $result=$db_obj->query($deluser);

    }

}


?>