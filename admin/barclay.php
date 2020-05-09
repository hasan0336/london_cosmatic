<?php
include_once "../Model/Db_Connection.php";
$db_obj=DB_Connection::db_connect();

$footerpage="SELECT * FROM `barclay`";
$result=$db_obj->query($footerpage);

while ($row=$result->fetch_array()) {
	
    $heading=$row['barclay_pw'];
    $pspid=$row['pspid'];
	
}


?>

<form method="POST" id="myform" action="../Controller/footer-page.php" enctype="multipart/form-data">
			<div class="form-group">
			<label for="Heading">Barclay (Pw)</label>
			<input type="text" id="heading" name="heading" value="<?php echo $heading;?>" class="form-control"/>
			</div>
            <div class="form-group">
			<label for="Heading">PSPID</label>
			<input type="text" id="editor1" name="barclay" value="<?php echo $pspid;?>" class="form-control"/>
			</div>
			
			<input type="hidden" name="hidden" value="barclay" id="hidden"/>   
				<input type="submit" name="submit" value="Save" id="save2" class="btn btn-success"/>
			</form>
          	