<?php  
session_start();
include_once "View/top_file.php";
include_once "Model/Db_Connection.php";
?>
<?php 
include_once "View/header.php";
?>

<?php
$db_obj=DB_Connection::db_connect();

$event="SELECT * FROM `manageevent`";
$result=$db_obj->query($event);


    while($row=$result->fetch_array()){
            
            $events=$row['content'];
    }
?>
</head>
<body>



<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
            <!--<div style="width:100%; height: 600px;  text-align:center; margin-top:200px">-->
            <!--    <img src="assets/images/Title-ComingSoon.png" alt="coming soon">-->
        
            <!--</div>-->
            <?php echo $events;?>
        </div>
    </div>
</div>

<?php  include_once "View/fotter.php";?>

<?include_once "View/bottom_file.php"; ?>

</body>
</html>