<?php  
session_start();
include_once "View/top_file.php";
include_once "Model/Db_Connection.php";
?>
</head>
<body>
<?php 
include_once "View/header.php";
?>
<style type="text/css">
            ul.breadcrumb li:last-child:after {
                border: 0;
            }
        </style>
<div class="container">
<ul class="breadcrumb">
  <li><a href="index11.php">Home</a></li>
  <li><a href="thankyou.php">Thank You</a></li>
</ul>
</div>
<!-- <?php
$db_obj=DB_Connection::db_connect();

$footerpage="SELECT * FROM `aboutus`";
$result=$db_obj->query($footerpage);

while ($row=$result->fetch_array()) {
	
	$heading=$row['heading'];
	$content=$row['content'];
}


?> -->

<div class="container">
    <center>
      <div >
        <p>Your order has been placed successfully.</p> 
        <p></p>
        <p>Thank you for shopping with us.</p>    
      </div>
      
    </center>
    
    <br/>
    <br/>
    <br/>
    <br/>
</div>



<?php  include_once "View/fotter.php";?>

<?include_once "View/bottom_file.php"; ?>

</body>
</html>