<?php

include_once "Db_Connection.php";
class Message extends DB_Connection{

    private $fullname;
    private $email;
    private $telephone;
    private $subject;
    private $message;
    private $message_id;
    private $message_date;
   


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
    private function set_telephone($telephone){
        $reg_username="/^[0-9\+]+$/i";

        if(!preg_match($reg_username,$telephone)){
            throw new Exception("Please Enter Phone");   
        }
        $this->telephone=$telephone;
    }
    private function get_telephone(){
        return $this->telephone;
    }
    private function set_subject($subject){
        $reg_password="/^[a-z0-9\s]+$/i";

        if(!preg_match($reg_password,$subject)){
            throw new Exception("Please Enter Subject");   
        }
        $this->subject=$subject;
    }
    private function get_subject(){
        return $this->subject;
    }
    
    private function set_message($message){
        $reg_username="/^[a-z0-9\@\_\.\s]+$/i";

        if(!preg_match($reg_username,$message)){
            throw new Exception("Please Enter Home Address");   
        }
        $this->message=$message;
    }
    private function get_message(){
        return $this->message;
    }
    private function get_message_id(){
        return $this->message_id;
    }
    private function get_message_date(){
        $datee=date('d M,Y',strtotime($this->message_date));
        return $datee;
    }
    //Register
    public function AddMessage(){

        $db_obj=Db_Connection::db_connect();

        $adduser="INSERT INTO `messages`(`fullname`, `email`, `telephone`, `subject`, `message`) VALUES ('$this->fullname','$this->email','$this->telephone','$this->subject','$this->message')";
        $result=$db_obj->query($adduser);
        if(!$result){
            throw new Exception("Please Contact with Naveed Ahmad");
            
        }
    }
    // Login 
    public function GetMessage($start,$limit){

        $db_obj=Db_Connection::db_connect();


        $selectuser="SELECT * FROM `messages` ORDER BY message_id DESC LIMIT $start,$limit";

        $result=$db_obj->query($selectuser);

        $messages=array();
        while ($data=$result->fetch_object()) {
            $u=new Message();
            $u->message_id=$data->message_id;
            $u->fullname=$data->fullname;
            $u->email=$data->email;
            $u->telephone=$data->telephone;
            $u->subject=$data->subject;
            $u->message=$data->message;
            $u->message_date=$data->message_date;

            $messages[]=$u;

        }
        return $messages;
    }
    public function DelMessage($id){
        $db_obj=Db_Connection::db_connect();

        $deluser="DELETE from `messages` where `message_id`='$id'";

        $result=$db_obj->query($deluser);

    }

}


?>