<?php
function items(){
    
    
        
        
                                       $cip=get_client_ip();
                                        $obj_db=Db_Connection::db_connect();

                                        $cart="SELECT * FROM `shoppingcart` WHERE `ip_add`='$cip'"; 

                                         $result=$obj_db->query($cart);
                                         $ddd=$result->fetch_array();
                                         
                                         $countitems=mysqli_num_rows($ddd);
  
                                      
    echo $countitmes;
    
    
}

?>