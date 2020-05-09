<?php
include_once 'Db_Connection.php';
class Slider extends Db_Connection{
    
    private $sliderimage;
    private $imagedimension;
    private $heading;
    private $colorHeadingSlider;
    private $divDim;
    private $description;
    private $URL;
    // private $imagehome11;
    // private $imagehome22;
    private $imagehome33;
    //private $imagehome44;



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

// private function set_imagehome11($imagehome11){

//     if($imagehome11["type"]==4){
//         throw new Exception("Please Select Image");
        
//     }

//     $imagename=rand(1000,100000);
//     $path_info=pathinfo($imagehome11['name']);
//     extract($path_info);
//     //$this->profile_image="slider" . "." .$extension;
//     $this->imagehome11=$imagename.".".$extension;
// }
// private function set_imagehome22($imagehome22){

//     if($imagehome22["type"]==4){
//         throw new Exception("Please Select Image");
        
//     }

//     $imagename=rand(1000,100000);
//     $path_info=pathinfo($imagehome22['name']);
//     extract($path_info);
//     //$this->profile_image="slider" . "." .$extension;
//     $this->imagehome22=$imagename.".".$extension;
// }
private function set_imagehome33($imagehome33){

    if($imagehome33["type"]==4){
        throw new Exception("Please Select Image");
        
    }

    $imagename=rand(1000,100000);
    $path_info=pathinfo($imagehome33['name']);
    extract($path_info);
    //$this->profile_image="slider" . "." .$extension;
    $this->imagehome33=$imagename.".".$extension;
}
// private function set_imagehome44($imagehome44){

//     if($imagehome44["type"]==4){
//         throw new Exception("Please Select Image");
        
//     }

//     $imagename=rand(1000,100000);
//     $path_info=pathinfo($imagehome44['name']);
//     extract($path_info);
//     //$this->profile_image="slider" . "." .$extension;
//     $this->imagehome44=$imagename.".".$extension;
// }

private function get_sliderimage(){
    return $this->imagehome11;
}
// private function get_imagehome11(){
//     return $this->imagehome11;
// }
// private function get_imagehome22(){
//     return $this->imagehome22;
// }
private function get_imagehome33(){
    return $this->imagehome33;
}
// private function get_imagehome44(){
//     return $this->imagehome44;
// }
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

// public function upload_imagehome($source_name){
    
//     $str_path="../HomePageimages/$this->imagehome11";
//     if(!is_dir("../HomePageimages")){
//         if(!mkdir("../HomePageimages")){
//             throw new Exception("Failde to create folder");
//         }
//     }
    
//     $result=@move_uploaded_file($source_name, $str_path);
//     if(!$result){
//         throw new Exception("Your file is not upload");
//     }
// }
// public function upload_imagehome2($source_name){
    
//     $str_path="../HomePageimages/$this->imagehome22";
//     if(!is_dir("../HomePageimages")){
//         if(!mkdir("../HomePageimages")){
//             throw new Exception("Failde to create folder");
//         }
//     }
    
//     $result=@move_uploaded_file($source_name, $str_path);
//     if(!$result){
//         throw new Exception("Your file is not upload");
//     }
// }
public function upload_imagehome3($source_name){
    
    $str_path="../HomePageimages/$this->imagehome33";
    if(!is_dir("../HomePageimages")){
        if(!mkdir("../HomePageimages")){
            throw new Exception("Failde to create folder");
        }
    }
    
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}
// public function upload_imagehome4($source_name){
    
//     $str_path="../HomePageimages/$this->imagehome44";
//     if(!is_dir("../HomePageimages")){
//         if(!mkdir("../HomePageimages")){
//             throw new Exception("Failde to create folder");
//         }
//     }
    
//     $result=@move_uploaded_file($source_name, $str_path);
//     if(!$result){
//         throw new Exception("Your file is not upload");
//     }
// }

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
private function set_colorHeadingSlider($colorHeadingSlider){

    $this->colorHeadingSlider=$colorHeadingSlider;
}
private function get_colorHeadingSlider(){
    return $this->heading;
}
private function set_divDim($divDim){

    $this->divDim=$divDim;
}
private function get_divDim(){
    return $this->heading;
}
private function get_heading(){
    return $this->divDim;
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

    // $pro_reg="/^[a-z0-9\s\:\/\/\.]+$/i";
    // if(!preg_match($pro_reg,$URL)){
    //         throw new Exception("Please Enter Product Name");       
    // }
    $this->URL=$URL;
}
private function get_URL(){
    return $this->URL;
}
public function UpdateSlider($id){
    
    $this->sliderimage; 
    $db_obj=Db_Connection::db_connect();
    $updateimage="UPDATE `slider` SET `Photo`='$this->sliderimage' where `slider_id`='$id'";
    
    $result=$db_obj->query($updateimage);
    
}
public function UpdateHomeImage1($id){
    $this->imagehome11;
    $db_obj=Db_Connection::db_connect();
    $updateimage="UPDATE `singleimage1` SET `Photo`='$this->imagehome11' where `singleimage1_id`='$id'";
    $result=$db_obj->query($updateimage);
    
}

public function UpdateHomeImage2($id){
    $this->imagehome22;
    $db_obj=Db_Connection::db_connect();
    $updateimage="UPDATE `singleimage2` SET `Photo`='$this->imagehome22' where `singleimage2_id`='$id'";
    $result=$db_obj->query($updateimage);
    
}

public function UpdateHomeImage3($id){
    $this->imagehome33;
    $db_obj=Db_Connection::db_connect();
    $updateimage="UPDATE `singleimage3` SET `Photo`='$this->imagehome33' where `singleimage3_id`='$id'";
    $result=$db_obj->query($updateimage);
    
}

public function UpdateHomeImage4($id){
    $this->imagehome44;
    $db_obj=Db_Connection::db_connect();
    $updateimage="UPDATE `singleimage4` SET `Photo`='$this->imagehome44' where `singleimage4_id`='$id'";
    $result=$db_obj->query($updateimage);
    
}

public function UpdateSliderDetails($id){
    
    $db_obj=Db_Connection::db_connect();
    $updateimage="UPDATE `slider` SET `ImageDimension`='$this->imagedimension',`Heading`='$this->heading',`colorHeadingSlider`='$this->colorHeadingSlider',`divDim`='$this->divDim',`description`='$this->description',`URL`='$this->URL' where `slider_id`='$id'";
    
    $result=$db_obj->query($updateimage);
    
}

public function UpdateHomePageImgDetails($id){
    
    $db_obj=Db_Connection::db_connect();
    $updateimage="UPDATE `singleimage3` SET `ImageDimension`='$this->imagedimension',`Heading`='$this->heading',`colorHeadingSlider`='$this->colorHeadingSlider',`divDim`='$this->divDim',`description`='$this->description',`URL`='$this->URL' where `singleimage3_id`='$id'";
    
    $result=$db_obj->query($updateimage);
    
}

public function Getsliderdetial($id){
    $db_obj=Db_Connection::db_connect();
    
    $sliders="select * from `slider` where `slider_id`='$id'";
    
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