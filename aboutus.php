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
<div class="container">
<ul class="breadcrumb">
  <li><a href="index11.php">Home</a></li>
  <li><a href="aboutus.php">About Us</a></li>
</ul>
</div>
<?php
$db_obj=DB_Connection::db_connect();

$footerpage="SELECT * FROM `aboutus`";
$result=$db_obj->query($footerpage);

while ($row=$result->fetch_array()) {
	
	$heading=$row['heading'];
	$content=$row['content'];
}


?>

<div class="container">
    <?php echo $content;?>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
</div>



<?php  include_once "View/fotter.php";?>

<?include_once "View/bottom_file.php"; ?>

</body>
</html>