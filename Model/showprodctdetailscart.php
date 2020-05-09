<?php

include_once "Model/Db_Connection.php";
include_once "getip.php";
class MyBag{
    public $product_name;
    public $product_price;
    public $product_description;
    public $product_image;
    public $quntity;
    public $proid;

    public function product_name(){
        return $this->product_name;

    }
    public function proid(){
        return $this->proid;
    }
    public function product_price(){
        return $this->product_price;

    }
    public function product_description(){
        return $this->product_description;

    }
    public function product_image(){
        return $this->product_image;
    }
    public function quntity(){
        return $this->quntity;
    }

public function ShowBag(){


$cip=get_client_ip();
$obj_db=Db_Connection::db_connect();
$carts=array();

$produdtdetails="SELECT * from  shoppingcart JOIN products ON(shoppingcart.product_id=products.product_id) WHERE shoppingcart.ip_add='$cip'";

$result=$obj_db->query($produdtdetails);
if(!$result){
    echo $obj_db->error;
}
if($result){
    $totalprice=0;
    while ($row=$result->fetch_object()) {
        $totalprice     = $row->qty*$row->product_price;
        //$total_amount   = $total_amount+$totalprice;
        $bag=new MyBag();
        $bag->proid=$row->product_id;
        $bag->product_name=$row->product_name;
        $bag->product_price=$row->product_price;
        $bag->total_amount=$totalprice;
        $bag->product_description=$row->product_description;
        $bag->product_image=$row->product_image;
        $bag->quntity=$row->qty;
        $bag->product_size=$row->product_size;

        $carts[]=$bag;
    }
    return $carts;
}


}
}


?>