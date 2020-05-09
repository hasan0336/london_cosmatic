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
  <li><a href="index.php">Home</a></li>
  <li><a href="contactus.php">Contact Us</a></li>
</ul>
</div>
<?php

$db_obj=DB_Connection::db_connect();

$footerpage="SELECT * FROM `contactus`";
$result=$db_obj->query($footerpage);

while ($row=$result->fetch_array()) {
	
	$heading=$row['heading'];
	$content=$row['content'];
}


?>
<div class="container contact-page" style="padding-top: 120px">
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <div style="margin-bottom: 2%;">
    <span class="sameheading">Contact Us 
    <span style="color:red;">
        <?php
        // if(isset($_SESSION['message'])){
        //     $message=$_SESSION['message'];
        //     echo $message;
        //     unset($_SESSION['message']);
        // }
        ?>
    </span>
    </span>
    <!-- <span class="sameheading"><span class="samebigchar">C</span>ONTACT <span class="samebigchar">U</span>S</span> -->
</div>
        <form action="Controller/contactmessage.php" method="POST">
            <div class="form-group">
                <input type="text" name="fullname" class="contact-text form-control form-control-lg" placeholder="Full Name" required />
            </div>

            <div class="form-group">
                <input type="text" name="telephone" class="contact-text form-control form-control-lg" placeholder="Telephone Number" required />
            </div>

            <div class="form-group">
                <input type="email" name="email" class="contact-text form-control form-control-lg" placeholder="Email" required />
            </div>

            <div class="form-group">
                <input type="text" name="subject" class="contact-text form-control form-control-lg" placeholder="Subject" required />
            </div>

            <div class="form-group">
                <textarea name="message" rows="5" class="contact-text1 form-control form-control-lg" placeholder="Write Here" required></textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="SEND" class="form-control form-control-lg contact-btn" value="SEND" />
            </div>
        </form>
        <br>
        <br>
        <br>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
       
               <?php echo $content;?>
        
    </div>
    
</div>

</div>

<?php  include_once "View/fotter.php";

include_once "View/bottom_file.php";
?>

</body>
</html>