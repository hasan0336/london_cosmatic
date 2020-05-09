<?php
include_once 'Db_Connection.php';
include_once 'getip.php';
class Product extends Db_Connection{

    private $product_name;
    private $product_price;
    private $product_category;
    private $product_desction;
    private $product_size;
    private $product_image;
    private $product_image1;
    private $product_image2;
    private $product_style;
    private $product_color;
    private $product_brand;
    private $proid;
    private $cat_id;
    private $style_id;
    private $color_id;
    private $brand_id;
    private $totalprice;
    private $subtotalprice;
    private $charges;
    private $sub_cat_id;
    private $subcategory;
    private $status;
    private $created_at;
    private $category_id;

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

private function set_product_name($product_name){

    $pro_reg="/^[a-z0-9\s]+$/i";
    if(!preg_match($pro_reg,$product_name)){
            throw new Exception("Please Enter Product Name");       
    }
    $this->product_name=$product_name;
}
private function get_product_name(){
    return $this->product_name;
}
private function set_product_price($product_price){

    $pro_reg="/^[0-9]+$/";
    if(!preg_match($pro_reg,$product_price)){
            throw new Exception("Please Enter Product Price");
            
    }
    $this->product_price=$product_price;
}
private function get_product_price(){
    return $this->product_price;
}
private function set_product_category($product_category){
    // $pro_reg="/^[a-z0-9]+$/i";
    // if(!preg_match($pro_reg,$product_category)){
    //         throw new Exception("Please Enter Product Name");
    // }
    $this->product_category=$product_category;
}

private function get_product_category(){
    return $this->product_category;
}

private function set_subcategory($subcategory){

    // $pro_reg="/^[a-z0-9]+$/i";
    // if(!preg_match($pro_reg,$subcategory)){
    //         throw new Exception("Please Enter Product Name");
    // }
    $this->subcategory=$subcategory;
}    
private function get_subcategory(){
    return $this->subcategory;
}
private function set_product_desction($product_desction){

    // $pro_reg="/^[a-z0-9\s]+$/i";
    // if(!preg_match($pro_reg,$product_desction)){
    //         throw new Exception("Please Enter Product Description");
            
    // }
     $this->product_desction=$product_desction;
}
private function get_product_desction(){
    return $this->product_desction;
}
private function set_category_id($category_id){
    $this->category_id = $category_id;
}
private function get_category_id(){
    return $this->category_id;
}
public function getSubCategories($id, $subcat_id=0){

    $db_obj=Db_Connection::db_connect();
    $sql="SELECT * FROM `subcategory` where cat_id = $id";
    $result=$db_obj->query($sql);
    $list='';
    if (mysqli_num_rows($result)>0) {

        $list.='<option value="">Selects Sub Category</option>';
        while($row = $result->fetch_array()){
            if ($row['sub_cat_id']==$subcat_id) {
                $list.='<option value="'.$row['sub_cat_id'].'" selected>'.$row['subcategory'].'</option>';
            }else{
                $list.='<option value="'.$row['sub_cat_id'].'">'.$row['subcategory'].'</option>';
            }
            
        }
    }else{
        $list = 0;
    }    
     
    return $list;
}
private function set_product_size($product_size){

    // $pro_reg="/^[a-z0-9]+$/i";
    // if(!preg_match($pro_reg,$product_size)){
    //         throw new Exception("Please Enter Product Description");
    // }
    $this->product_size=$product_size;
}
private function get_product_size(){
    return $this->product_size;
}
private function set_product_style($product_style){

    // $pro_reg="/^[a-z0-9]+$/i";
    // if(!preg_match($pro_reg,$product_style)){
    //         throw new Exception("Please Enter Select Product Style");
    // }
    $this->product_style=$product_style;
}
private function get_product_style(){
    return $this->product_style;
}
private function set_product_color($product_color){

    // $pro_reg="/^[a-z0-9]+$/i";
    // if(!preg_match($pro_reg,$product_color)){
    //         throw new Exception("Please Enter Select Product Color");
    // }
    $this->product_color=$product_color;
}
private function get_product_color(){
    return $this->product_color;
}
private function set_product_brand($product_brand){

    // $pro_reg="/^[a-z0-9]+$/i";
    // if(!preg_match($pro_reg,$product_brand)){
    //         throw new Exception("Please Enter Select Product Brand");
    // }
    $this->product_brand=$product_brand;
}
private function get_product_brand(){
    return $this->product_brand;
}
private function get_cat_id(){
    return $this->cat_id;
}
private function get_sub_cat_id(){
    return $this->sub_cat_id;
}
private function get_style_id(){
    return $this->style_id;
}
private function get_color_id(){
    return $this->color_id;
}
private function get_brand_id(){
    return $this->brand_id;
}
private function get_proid(){
    return $this->proid;
}
private function get_totalprice(){
    return $this->totalprice;
}
private function get_subtotalprice(){
    return $this->subtotalprice;
}
private function get_charges(){
    return $this->charges;
}
private function set_product_image($product_image){
    if (!empty($product_image)) {
        
        if($product_image["type"]==4){
            throw new Exception("Please Select Image");
        }
        $imagename=rand(1000,100000);
        $path_info=pathinfo($product_image['name']);
        extract($path_info);
        //$this->profile_image="$this->username" . "." .$extension;
        $this->product_image=$imagename.".".$extension;
    }else{
        $this->product_image='';
    }
}

private function get_product_image(){
    return $this->product_image;
}
public function upload_product_image($source_name){

    $str_path="../Product/$this->product_name/$this->product_image";
    if(!is_dir("../Product")){
        if(!mkdir("../Product")){
            throw new Exception("Failde to create folder");
        }
    }
    if(!is_dir("../Product/$this->product_name")){
        if(!mkdir("../Product/$this->product_name")){
            throw new Exception("Failde to create product name");
        }
    }
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }

}
private function set_product_image1($product_image1){
    if(!empty($product_image1)){
        if($product_image1["type"]==4){
        throw new Exception("Please Select Image");
    }

        $imagename=rand(1000,100000);
        $path_info=pathinfo($product_image1['name']);
        extract($path_info);
        //$this->profile_image="$this->username" . "." .$extension;
        $this->product_image1=$imagename.".".$extension;
    }else{
        $this->product_image1='';
    }
    
}

private function get_product_image1(){
    return $this->product_image1;
}
public function upload_product_image1($source_name){
    $str_path="../SubProduct/$this->product_name/$this->product_image1";
    if(!is_dir("../SubProduct")){
        if(!mkdir("../SubProduct")){
            throw new Exception("Failde to create folder");
        }
    }
    if(!is_dir("../SubProduct/$this->product_name")){
        if(!mkdir("../SubProduct/$this->product_name")){
            throw new Exception("Failde to create product name");
        }
    }
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}
private function set_product_image2($product_image2){
    if(!empty($product_image2)){
        if($product_image2["type"]==4){
            throw new Exception("Please Select Image");
            
        }

        $imagename=rand(1000,100000);
        $path_info=pathinfo($product_image2['name']);
        extract($path_info);
        //$this->profile_image="$this->username" . "." .$extension;
        $this->product_image2=$imagename.".".$extension;
    }else{
        $this->product_image2='';
    }
}

private function get_product_image2(){
    return $this->product_image2;
}
public function upload_product_image2($source_name){
    $str_path="../SubProduct/$this->product_name/$this->product_image2";
    if(!is_dir("../SubProduct")){
        if(!mkdir("../SubProduct")){
            throw new Exception("Failde to create folder");
        }
    }
    if(!is_dir("../SubProduct/$this->product_name")){
        if(!mkdir("../SubProduct/$this->product_name")){
            throw new Exception("Failde to create product name");
        }
    }
    $result=@move_uploaded_file($source_name, $str_path);
    if(!$result){
        throw new Exception("Your file is not upload");
    }
}
public function ShowCategory(){

    $db_obj=Db_Connection::db_connect();

    $category="SELECT * FROM `category`";

    $result=$db_obj->query($category);

    $cat_list=array();
    while($row=$result->fetch_object()){

        $cat_obj=new Product();

        $cat_obj->product_category=$row->category;
        $cat_obj->cat_id=$row->cat_id;
        


        $cat_list[]=$cat_obj;

    }
    return $cat_list;
}

public function ShowSubCategoryById($catid){

    $db_obj=Db_Connection::db_connect();
    $subcategory="SELECT * FROM `subcategory` where cat_id =$catid";
    $result=$db_obj->query($subcategory);
    $subcat_list=array();
    while($row=$result->fetch_object()){
        $subcat_obj=new Product();
        $subcat_obj->subcategory=$row->subcategory;
        $subcat_obj->sub_cat_id=$row->sub_cat_id;
        $subcat_list[]=$subcat_obj;
    }
    return $subcat_list;
}

public function addCategory(){
    $db_obj=Db_Connection::db_connect();
    $insert="INSERT INTO `category`(`category`) values('$this->product_category')";

    $resutl=$db_obj->query($insert);
}
public function ShowSubCategory(){

    $db_obj=Db_Connection::db_connect();

    $subcategory="SELECT * FROM `subcategory`";

    $result=$db_obj->query($subcategory);

    $subCat_list=array();
    while($row=$result->fetch_object()){

        $subCat_obj=new Product();

        $subCat_obj->subcategory  = $row->subcategory;
        $subCat_obj->sub_cat_id   = $row->sub_cat_id;
        


        $subCat_list[]=$subCat_obj;

    }
    return $subCat_list;
}
public function addSubCategory(){
    $db_obj=Db_Connection::db_connect();
    $insert="INSERT INTO `subcategory`(`subcategory`,`cat_id`,`status`,`created_at`) values('$this->subcategory','$this->product_category','$this->status','$this->created_at')";

    $resutl=$db_obj->query($insert);
}
public function ShowStyle(){

    $db_obj=Db_Connection::db_connect();

    $category="SELECT * FROM `style`";

    $result=$db_obj->query($category);

    $style_list=array();
    while($row=$result->fetch_object()){

        $style_obj=new Product();

        $style_obj->product_style=$row->style;
        $style_obj->style_id=$row->style_id;
   

        $style_list[]=$style_obj;

    }
    return $style_list;
}
public function addStyle(){
    $db_obj=Db_Connection::db_connect();
    $insert="INSERT INTO `style`(`style`) values('$this->product_style')";

    $resutl=$db_obj->query($insert);
}
public function ShowColor(){

    $db_obj=Db_Connection::db_connect();

    $color="SELECT * FROM `color`";

    $result=$db_obj->query($color);

    $color_list=array();
    while($row=$result->fetch_object()){

        $color_obj=new Product();

        $color_obj->product_color=$row->color;
        $color_obj->color_id=$row->color_id;
   

        $color_list[]=$color_obj;

    }
    return $color_list;
}
public function addColor(){
    $db_obj=Db_Connection::db_connect();
    $insert="INSERT INTO `color`(`color`) values('$this->product_color')";

    $resutl=$db_obj->query($insert);
}
public function ShowBrand(){

    $db_obj=Db_Connection::db_connect();

    $brand="SELECT * FROM `brand`";

    $result=$db_obj->query($brand);

    $brand_list=array();
    while($row=$result->fetch_object()){

        $brand_obj=new Product();

        $brand_obj->product_brand=$row->brand;
        $brand_obj->brand_id=$row->brand_id;
   

        $brand_list[]=$brand_obj;

    }
    return $brand_list;
}
public function addBrand(){
    $db_obj=Db_Connection::db_connect();
    $insertbrand="INSERT INTO `brand`(`brand`) values('$this->product_brand')";

    $resutl=$db_obj->query($insertbrand);
}

public function SearchProduct($category,$subcat,$style,$color,$brand){

    $db_obj=Db_Connection::db_connect();

    if ($subcat > 0 && $category > 0) {
        $where = 'where `cat_id`='.$category.' and `sub_cat_id`='.$subcat.'';
    }else{
        $where = 'where `cat_id`='.$category.'';
    }

    $productlist="SELECT * FROM `products` $where or `style_id`='$style' or `color_id`='$color' or `brand_id`='$brand'";

    
    $result=$db_obj->query($productlist);

    if(!$result){

       echo $db_obj->error;
    
    }

    $product_list=array();
    while($row=$result->fetch_object()){

        $product_obj=new Product();
        $product_obj->proid=$row->product_id;
        $product_obj->product_name=$row->product_name;
        $product_obj->product_price=$row->product_price;
        $product_obj->product_image=$row->product_image;
        $product_list[]=$product_obj;

    }
    return $product_list;
}

public function DetailsProduct($id){

    $db_obj=Db_Connection::db_connect();

    $productlist="SELECT * FROM products JOIN category on(products.cat_id=category.cat_id)  where product_id=$id";
    $result=$db_obj->query($productlist);

    if(!$result){ echo "sorry";}
    // while($row=$result->fetch_object()){
        if($result){
            $row=$result->fetch_object();
        
            $this->proid=$row->product_id;
            $this->product_name=$row->product_name;
            $this->product_desction=$row->product_description;
            $this->product_price=$row->product_price;
            $this->product_size=$row->product_size;
            $this->product_image=$row->product_image;
            $this->product_category=$row->category;
            $this->sub_cat_id=$row->sub_cat_id;
            $this->cat_id=$row->cat_id;
        
        return $this;
        }
        
}
public function AddProduct(){

    $db_obj=Db_Connection::db_connect();
    $addproduct="INSERT INTO `products`(`product_name`,`product_description`,`product_price`,`product_size`,`cat_id`,`sub_cat_id`,`style_id`,`color_id`,`brand_id`,`product_image`) Values('$this->product_name','$this->product_desction','$this->product_price','$this->product_size','$this->product_category','$this->subcategory','$this->product_style','$this->product_color','$this->product_brand','$this->product_image')"; 

    $result=$db_obj->query($addproduct);
    
    if(!$result){
        echo $db_obj->error;
    }
    if($result){
        $last_id = $db_obj->insert_id;
        $subproduct="INSERT INTO `productimages`(`project_id`,`product_img`,`product_img2`) Values('$last_id','$this->product_image1','$this->product_image2')";

        $result1=$db_obj->query($subproduct);
    }
    }

    public function GetProduct($start,$limit){
        $db_obj=Db_Connection::db_connect();
      
     $showproduct="SELECT * FROM `products` ORDER BY `product_id` DESC limit $start,$limit ";
      
        $result=$db_obj->query($showproduct);
        
       
        if(!$result){
            echo $db_obj->error;
           
        }
        $product_list=array();
      
        while($row=$result->fetch_object()){

            $product_obj=new Product();
            $product_obj->proid=$row->product_id;
            $product_obj->product_name=$row->product_name;
            $product_obj->product_desction=$row->product_description;
            $product_obj->product_price=$row->product_price;
            $product_obj->product_image=$row->product_image;
           
            
            $product_list[]=$product_obj;
    
        }
        return $product_list;
    }
     public function GetProductTop(){
        $db_obj=Db_Connection::db_connect();
      
      $showproduct="SELECT * FROM `products` LIMIT 4";
      
        $result=$db_obj->query($showproduct);
        
        if(!$result){
            echo $db_obj->error;
        }
        $product_list=array();
      
        while($row=$result->fetch_object()){

            $product_obj=new Product();
            $product_obj->proid=$row->product_id;
            $product_obj->product_name=$row->product_name;
            $product_obj->product_desction=$row->product_description;
            $product_obj->product_price=$row->product_price;
            $product_obj->product_image=$row->product_image;
           
            
            $product_list[]=$product_obj;
    
        }
        return $product_list;
    }
    // Show Product by id 
    public function GetProductById($id){
    $db_obj=Db_Connection::db_connect();
     $showproduct="SELECT * FROM `products` JOIN `productimages` ON(products.product_id=productimages.project_id) JOIN `category` ON(products.cat_id=category.cat_id) JOIN `style` ON(products.style_id=style.style_id) JOIN `color` ON(products.color_id=color.color_id) JOIN `brand` ON(products.brand_id=brand.brand_id) WHERE products.product_id='$id'";
      
        $result=$db_obj->query($showproduct);
        if(!$result){ echo $db_obj->error; echo "sorry";}
        
        while($row=$result->fetch_object()){

            //$product_obj=new Product();
            $this->proid=$row->product_id;
            $this->product_name=$row->product_name;
            $this->product_price=$row->product_price;
            $this->product_image=$row->product_image;
            $this->product_image1=$row->product_img;
            $this->product_image2=$row->product_img2;
            $this->product_desction=$row->product_description;
            $this->product_category=$row->category;
            $this->cat_id=$row->cat_id;
            $this->subcategory=$row->sub_cat_id;
            $this->product_size=$row->product_size;
            $this->product_color=$row->color;
            $this->color_id=$row->color_id;
            $this->product_style=$row->style;
            $this->style_id=$row->style_id;
            $this->product_brand=$row->brand;
            $this->brand_id=$row->brand_id;
          //  $product_list[]=$product_obj; 
        }
        return $this;
    }
    // Delete Product
    public function Deleteproduct($id){
        $db_obj=Db_Connection::db_connect();
        $deletedropduct="DELETE FROM   `products` where product_id=$id";
        $result=$db_obj->query($deletedropduct);
        if($result){
            $deletesubimage="DELETE FROM   `productimages` where product_id=$id";
            $result1=$db_obj->query($deletesubimage);
        }


    }
    // Count Total Price
    public function Allprice(){

        $db_obj=Db_Connection::db_connect();
        $ip=get_client_ip();
        $sql="SELECT  shoppingcart.qty, products.product_price FROM shoppingcart join products on(shoppingcart.product_id=products.product_id) where shoppingcart.ip_add='$ip'";

        $result = $db_obj->query($sql);
       
        $subtotal_amount=0;
        $total_amount=0;
        while($row=$result->fetch_object()){

            $totalprice = $row->qty*$row->product_price;
            $subtotal_amount = $subtotal_amount+$totalprice;
        }
        $charges = 'SELECT * FROM `shippingcharge`';
        $res = $db_obj->query($charges);
        $row = $res->fetch_object();
        
        if ($subtotal_amount > $row->setamount) {
            $total_amount   = $subtotal_amount+$row->charge1;
            $this->charges  = $row->charge1;
        }else{
            $total_amount   = $subtotal_amount+$row->charge2;
            $this->charges  = $row->charge2;
        }
        $this->totalprice=$total_amount;
        $this->subtotalprice=$subtotal_amount;
        return $this;

    }
    
    // Update Product
    public function UpdateProduct($id){
        $db_obj=Db_Connection::db_connect();

        if (!empty($this->product_image)) {

            $showproduct="SELECT * FROM `products` WHERE products.product_id='$id'";
            $res11=$db_obj->query($showproduct);   
            $row11=$res11->fetch_object();

            if(!empty($row11->product_image)){
                $str_path="../Product/$row11->product_name/$row11->product_image";
                if (file_exists($str_path)) {
                   unlink($str_path);
                }
            }
            
            $product_image = ',products.product_image="'.$this->product_image.'"';
        }
        
          $update="UPDATE products set products.product_name='$this->product_name', products.product_description='$this->product_desction', products.product_price='$this->product_price', products.product_size='$this->product_size', products.cat_id='$this->product_category',products.sub_cat_id='$this->subcategory', products.style_id='$this->product_style', products.color_id='$this->product_color', products.brand_id='$this->product_brand' ".$product_image." where `product_id`='$id'";
        
        $result=$db_obj->query($update);
        
        if(!$result){
            echo $db_obj->error;
        }
        if($result){
            if (!empty($this->product_image1)) {
                echo $showproduct2="SELECT * FROM `products` JOIN `productimages` ON(products.product_id=productimages.project_id) WHERE `project_id` = $id";
                $res1=$db_obj->query($showproduct2);   
                $row1=$res1->fetch_object();

                if(!empty($row1->product_img)){
                    $str_path="../SubProduct/$row1->product_name/$row1->product_img";
                    if (file_exists($str_path)) {
                       unlink($str_path);
                    }
                }
                $subproduct="UPDATE `productimages` SET product_img ='$this->product_image1' WHERE project_id = $id";

            }
            
            if (!empty($this->product_image2)) {
                $showproduct3="SELECT * FROM `products` JOIN `productimages` ON(products.product_id=productimages.project_id) WHERE `project_id` = $id";
                $res2=$db_obj->query($showproduct3);   
                $row2=$res2->fetch_object();
                if(!empty($row2->product_img2)){
                    $str_path="../SubProduct/$row2->product_name/$row2->product_img2";
                    if (file_exists($str_path)) {
                       unlink($str_path);
                    }
                }
                 $subproduct="UPDATE `productimages` SET product_img2 ='$this->product_image2' WHERE project_id = $id";
            }
            

            $result1=$db_obj->query($subproduct);
        }

    }
    
    
    public function Search($name){
        $db_obj=Db_Connection::db_connect();
        $search="SELECT * FROM `products` where `product_name` LIKE '%$name%'";
        $result=$db_obj->query($search);
        
        if(!$result){
            echo $db_obj->error;
        }
        if($result->num_rows==0){
            echo "Sorry No Product found";
        }
        $product_lists=array();
        
        while($row=$result->fetch_object()){
            
         $product_obj=new Product();
            $product_obj->proid=$row->product_id;
            $product_obj->product_name=$row->product_name;
            $product_obj->product_desction=$row->product_description;
            $product_obj->product_price=$row->product_price;
            $product_obj->product_image=$row->product_image;
            
             $product_lists[]=$product_obj;
        }
        return $product_lists;
        
    }
    public function SelectCategory($id){
         $db_obj=Db_Connection::db_connect();
        $cate="SELECT * FROM `category` where `cat_id`='$id'";
        $result=$db_obj->query($cate);
        
        while($row=$result->fetch_object()){
            $this->product_category=$row->category;
        }
        return $this;
    }
    
    public function SubProduct($id){
         $db_obj=Db_Connection::db_connect();
         
        $cate="SELECT * FROM `productimages` where `project_id`='$id'";

        $result=$db_obj->query($cate);
       
        while($row=$result->fetch_object()){
           
            $this->product_image1=$row->product_img;
            $this->product_image2=$row->product_img2;
            
        }
        return $this;
    }
    public function getProdSubCatById($subcategory_id){
        $db_obj=Db_Connection::db_connect();
        $sql="SELECT * FROM `subcategory` where `sub_cat_id`='$subcategory_id'";
        $result=$db_obj->query($sql);
        if($result){
            $row=$result->fetch_object();
            echo $row->subcategory;
        }
    }
}

?>