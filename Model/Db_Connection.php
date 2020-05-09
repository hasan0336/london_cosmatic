<?php
define('baseUrl', 'https://offthecornerstore.com/'); 
// PayPal configuration 
define('PAYPAL_ID', 'Insert_PayPal_Business_Email'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'https://offthecornerstore.com/success.php'); 
define('PAYPAL_CANCEL_URL', 'https://offthecornerstore.com/cancel.php'); 
//define('PAYPAL_NOTIFY_URL', 'https://offthecornerstore.com/ipn.php'); 
define('PAYPAL_CURRENCY', 'GBP'); 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

 /**Developer:Naveed Ahmad
  * Skills : Full Stack Developer 
  * Software Management 
  * Company Name: GuroSoft 
  */
 // Database Clas
  class Db_Connection{
    private $localhost;
    private $username;
    private $password;
    private $database;
// Database Method()
    public static function db_connect(){

        // Call mysqli class and create a object 
        $db_obj=new Mysqli();
        //Now Connected Database 
        $db_obj->connect($localhost="localhost",$username="root",$password="");
        if($db_obj->connect_errno){
            throw new Exception("Please Check DB Connection Error");
        }
        //Now Connected Specific Database
        $db_obj->select_db($database="offtqnfa_ofthecorner");

        if($db_obj->errno){

            throw new Exception("Error Database Connection $db_obj->error");
            
        }
       return $db_obj;
    }
  }
 
 ?>

