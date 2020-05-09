<?php
include_once 'Db_Connection.php';
class Blog_model extends Db_Connection{
    
    private $title;
    private $image_1;
    private $image_2;
    private $image_3;
    private $image_4;
    private $description;


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


private function set_title($title){

    $this->title=$title;
}
private function get_title(){
    return $this->title;
}
private function set_description($description){

    $this->description=$description;
}
private function get_description(){
    return $this->description;
}

private function set_image_1($image_1){
    $imagename=rand(1000,100000);
    $path_info=pathinfo($image_1['name']);
    extract($path_info);
    //$this->profile_image="slider" . "." .$extension;
    $this->image_1=$image_1.".".$extension;
}
private function set_image_2($image_2){
    $imagename=rand(1000,100000);
    $path_info=pathinfo($image_2['name']);
    extract($path_info);
    //$this->profile_image="slider" . "." .$extension;
    $this->image_2=$image_2.".".$extension;
}
private function set_image_3($image_3){
    $imagename=rand(1000,100000);
    $path_info=pathinfo($image_3['name']);
    extract($path_info);
    //$this->profile_image="slider" . "." .$extension;
    $this->image_3=$image_3.".".$extension;
}
private function set_image_4($image_4){
    $imagename=rand(1000,100000);
    $path_info=pathinfo($image_4['name']);
    extract($path_info);
    //$this->profile_image="slider" . "." .$extension;
    $this->image_4=$image_4.".".$extension;
}



private function get_image1(){
    return $this->imagehome11;
}
private function get_image2(){
    return $this->imagehome11;
}
private function get_image3(){
    return $this->imagehome11;
}
private function get_image4(){
    return $this->imagehome11;
}


public function upload_image_1($source_name){
    $str_path="../blog_images/$this->image_1";
    if(!is_dir("../blog_images")){
        if(!mkdir("../blog_images")){
            throw new Exception("Failde to create folder");
        }
    }
    
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}
public function upload_image_2($source_name){
    $str_path="../blog_images/$this->image_2";
    if(!is_dir("../blog_images")){
        if(!mkdir("../blog_images")){
            throw new Exception("Failde to create folder");
        }
    }
    
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}
public function upload_image_3($source_name){
    $str_path="../blog_images/$this->image_3";
    if(!is_dir("../blog_images")){
        if(!mkdir("../blog_images")){
            throw new Exception("Failde to create folder");
        }
    }
    
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}
public function upload_image_4($source_name){
    $str_path="../blog_images/$this->image_4";
    if(!is_dir("../blog_images")){
        if(!mkdir("../blog_images")){
            throw new Exception("Failde to create folder");
        }
    }
    
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}


public function AddBlog(){

    $db_obj=Db_Connection::db_connect();
    $addblog="INSERT INTO `blog`(`title`,`description`,`image_1`,`image_2`,`image_3`,`image_4`) Values('$this->title','$this->description','$this->image_1','$this->image_2','$this->image_3','$this->image_4')"; 

    $result=$db_obj->query($addblog);
    
    if(!$result){
        echo $db_obj->error;
    }
    // if($result){
    //     $last_id = $db_obj->insert_id;
    //     $subproduct="INSERT INTO `productimages`(`project_id`,`product_img`,`product_img2`) Values('$last_id','$this->product_image1','$this->product_image2')";

    //     $result1=$db_obj->query($subproduct);
    // }
    }




}

?>