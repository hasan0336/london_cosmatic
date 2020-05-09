<?php

include_once "DB_Connection.php";
class AdminProfile extends DB_Connection{

    
    private $email;
    private $mail;
    private $password;
    private $firstname;
    private $lastname;
    private $photo;
    private $currentpassword;
   


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
    private function set_mail($mail){
        $reg_username="/^[a-z0-9\@\_\.]+$/i";

        if(!preg_match($reg_username,$mail)){
            throw new Exception("Please Enter Mail Address");   
        }
        $this->mail=$mail;
    }
    private function get_mail(){
        return $this->mail;
    }
    private function set_password($password){
        $reg_password="/^[a-z0-9\@\_\.!\#\$\%\^\&\*]+$/i";

        if(!preg_match($reg_password,$password)){
            throw new Exception("Please Enter Password");   
        }
        $this->password=$password;
    }
    private function get_password(){
        return $this->password;
    }
    private function set_currentpassword($currentpassword){
        $reg_password="/^[a-z0-9\@\_\.!\#\$\%\^\&\*]+$/i";

        if(!preg_match($reg_password,$currentpassword)){
            throw new Exception("Please Enter Password");   
        }
        $this->currentpassword=$currentpassword;
    }
    private function get_currentpassword(){
        return $this->currentpassword;
    }
    private function set_firstname($firstname){
        $reg_username="/^[a-z\s]+$/i";

        if(!preg_match($reg_username,$firstname)){
            throw new Exception("Please Enter First Name");   
        }
        $this->firstname=$firstname;
    }
    private function get_firstname(){
        return $this->firstname;
    }
    private function set_lastname($lastname){
        $reg_username="/^[a-z0-9\@\_\.\s]+$/i";

        if(!preg_match($reg_username,$lastname)){
            throw new Exception("Please Enter Last Name");   
        }
        $this->lastname=$lastname;
    }
    private function get_lastname(){
        return $this->lastname;
    }
    private function set_photo($photo){
        if($photo["type"]==4){
            throw new Exception("Please Select Image");
            
        }
    
      //  $imagename=rand(1000,100000);
        $path_info=pathinfo($photo['name']);
        extract($path_info);
        //$this->profile_image="$this->username" . "." .$extension;
        $this->photo="$this->firstname".".".$extension;
    }
    
    private function get_photo(){
        return $this->photo;
    }
    public function upload_photo($source_name){
        $str_path="../Photo/$this->firstname/$this->photo";
        if(!is_dir("../Photo")){
            if(!mkdir("../Photo")){
                throw new Exception("Failde to create folder");
            }
        }
        if(!is_dir("../Photo/$this->firstname")){
            if(!mkdir("../Photo/$this->firstname")){
                throw new Exception("Failde to create admin name");
            }
        }
        $result=@move_uploaded_file($source_name, $str_path);
        if(!$result){
            throw new Exception("Your file is not upload");
        }
    }
    //Register
    public function UpdateAdmin(){

        $db_obj=Db_Connection::db_connect();
        $selectpassword="SELECT  `admin_password` From `admin` where `admin_password`='$this->currentpassword'";
        $result=$db_obj->query($selectpassword);
        if($result){
          $updateadmin="UPDATE `admin` SET `admin_username`='$this->email',`mail`='$this->mail',`admin_password`='$this->password',`firstname`='$this->firstname',`lastname`='$this->lastname',`photo`='$this->photo'";
            $result=$db_obj->query($updateadmin);
            if(!$result){
                $db_obj->error;
            }

        }
    }
    public function SelectAdmin(){
        $db_obj=Db_Connection::db_connect();
        $selectadmin="SELECT * FROM  `admin`";
        $result=$db_obj->query($selectadmin);

        while ($row=$result->fetch_object()) {
                    $this->email=$row->admin_username;
                    $this->mail=$row->mail;
                    $this->password=$row->admin_password;
                    $this->firstname=$row->firstname;
                    $this->lastname=$row->lastname;
                    
        }
       
        return $this;

    }
   

}


?>