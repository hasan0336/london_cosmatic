<?php
include_once "Model/Db_Connection.php";
$db_obj=Db_Connection::db_connect();
if($_POST['id']>0){
    

 $showproduct="SELECT * FROM `products` where `product_id`>'".$_POST['id']."' order by product_id limit 8";
                            $result=$db_obj->query($showproduct);
                        
                         while($row=$result->fetch_array()){
                             $output.='
                             
                             <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                             <div class="imag-div">
                              <a class="thumbnail " href="Controller/DetailsProduct.php?proid='.$row['product_id'].'">
                             <div class=" img-hover-zoom"> 
                               <img alt="" src="Product/'.$row['product_name'].'/'.$row['product_image'].'" class="bottom-slider-image111 img-responsive" ></a></div>
                                    <a href="Controller/DetailsProduct.php?proid='. $row['product_id'].'" class="product-name-shop" style="margin-left:79px">'. $row['product_name'].'</a>
                                 <h3 class="product-name" id="originalPrice"><span>&#163;</span>'.$row['product_price'].'</h3>
                                                               </div>
                           </div>
                             ';
                             $id=$row['product_id'];
                         }
                         $output.='
                         
                         <div id="remove">
                           <button type="button" class="btn btn-primary" id="loadmore" data-idd="'.$id.'">Load More</button>
                            </div>
                         ';
                         
                         
                         echo $output;
                         
}
                         
                              
                              
                                
                                 
                                 
                                 
                               
                            





?>