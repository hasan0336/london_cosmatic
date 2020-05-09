<?php
include_once 'Db_Connection.php';
class Slider extends Db_Connection{
    
    private $sliderimage;
    private $imagedimension;
    private $heading;
    private $description;
    private $URL;




public function __set($name, $value) {
    $method_name = "set_$name";
    
    if(!method_exists($this, $method_name)){
        throw new Exception("SET: property of $name does not exist");
    }
    
    $this->$method_name($value);
    
}
public function __get($name) {
    $method_name = "get_$name";
    if(!method_exists($this, $method_name)){
        throw new Exception("GET: property of $name does not exist");
    }
    
    return $this->$method_name();
    
}
private function set_sliderimage($sliderimage){
    if($sliderimage["type"]==4){
        throw new Exception("Please Select Image");
        
    }

    $imagename=rand(1000,100000);
    $path_info=pathinfo($sliderimage['name']);
    extract($path_info);
    //$this->profile_image="slider" . "." .$extension;
    $this->sliderimage=$imagename.".".$extension;
}

private function get_sliderimage(){
    return $this->sliderimage;
}
public function upload_sliderimage($source_name){
    $str_path="../Slider/$this->sliderimage";
    if(!is_dir("../Slider")){
        if(!mkdir("../Slider")){
            throw new Exception("Failde to create folder");
        }
    }
    
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}

private function set_imagedimension($imagedimension){

    $pro_reg="/^[a-z0-9\s]+$/i";
    if(!preg_match($pro_reg,$imagedimension)){
            throw new Exception("Please Enter Product Name");       
    }
    $this->imagedimension=$imagedimension;
}
private function get_imagedimension(){
    return $this->imagedimension;
}

private function set_heading($heading){

    $pro_reg="/^[a-z0-9\s]+$/i";
    if(!preg_match($pro_reg,$heading)){
            throw new Exception("Please Enter Product Name");       
    }
    $this->heading=$heading;
}
private function get_heading(){
    return $this->heading;
}
private function set_description($description){

    $pro_reg="/^[a-z0-9\s]+$/i";
    if(!preg_match($pro_reg,$description)){
            throw new Exception("Please Enter Product Name");       
    }
    $this->description=$description;
}
private function get_description(){
    return $this->description;
}

private function set_URL($URL){

    $pro_reg="/^[a-z0-9\s\:\/\/\.]+$/i";
    if(!preg_match($pro_reg,$URL)){
            throw new Exception("Please Enter Product Name");       
    }
    $this->URL=$URL;
}
private function get_URL(){
    return $this->URL;
}
public function UpdateSlider($id){
    
    
    $db_obj=Db_Connection::db_connect();
    
    
     $updateimage="UPDATE `slider` SET `Photo`='$this->sliderimage' where `slider_id`='$id'";
    
    $result=$db_obj->query($updateimage);
    
}

public function UpdateSliderDetails($id){
    
    
    $db_obj=Db_Connection::db_connect();
    
    
    echo $updateimage="UPDATE `slider` SET `ImageDimension`='$this->imagedimension',`Heading`='$this->heading',`description`='$this->description',`URL`='$this->URL' where `slider_id`='$id'";
    
    $result=$db_obj->query($updateimage);
    
}
public function Getsliderdetial($id){
    $db_obj=Db_Connection::db_connect();
    
   echo $sliders="select * from `slider` where `slider_id`='$id'";
    
    $result=$db_obj->query($sliders);

    while($row=$result->fetch_object()){
        
        $this->imagedimension=$row->ImageDimension;
        $this->heading=$row->Heading;
        $this->description=$row->Description;
        $this->URL=$row->URL;
    }
    return $this;
}


}


?>