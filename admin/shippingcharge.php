<?php
include_once "../Model/Db_Connection.php";
$db_obj=DB_Connection::db_connect();

$footerpage="SELECT * FROM `shippingcharge`";
$result=$db_obj->query($footerpage);

while ($row=$result->fetch_array()) {
	
	$setamount=$row['setamount'];
    $charge1=$row['charge1'];
    $charge2=$row['charge2'];
}


?>

<form method="POST" id="myform" action="../Controller/shipping-charge.php" enctype="multipart/form-data">
			<div class="form-group">
			<label for="setamount">SetAmount</label>
			<input type="text" id="heading" name="heading" value="<?php echo $setamount;?>" class="form-control"/>
			</div>
			<div class="form-group">
			<label for="charge1">charge-1</label>
			<input type="text" id="editor1" name="editor1" value="<?php echo $charge1;?>" class="form-control"/>
			</div> 
            <div class="form-group">
			<label for="charge2">charge-2</label>
			<input type="text" id="hidden" name="hidden" value="<?php echo $charge2;?>" class="form-control"/>
			<input type="submit" name="submit" value="Save" id="save2" class="btn btn-success"/>
			</div>  
			     
			</form>
	