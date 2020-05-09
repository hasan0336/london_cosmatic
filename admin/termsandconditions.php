<?php
include_once "../Model/Db_Connection.php";
$db_obj=DB_Connection::db_connect();

$footerpage="SELECT * FROM `termandcondition`";
$result=$db_obj->query($footerpage);

while ($row=$result->fetch_array()) {
	
	$heading=$row['heading'];
	$content=$row['content'];
}


?>

<form method="POST" id="myform" action="../Controller/footer-page.php" enctype="multipart/form-data">
			<div class="form-group">
			<label for="Heading">Heading</label>
			<input type="text" id="heading" name="heading" value="<?php echo $heading;?>" class="form-control"/>
			</div>
			<div class="form-group">
			<label for="richtext">Contect</label>
			<textarea type="text" id="editor1" name="editor1" class="form-control"><?php echo $content;?></textarea>
			</div>
			<input type="hidden" name="hidden" value="tc" id="hidden"/>   
			<input type="submit" name="submit" value="Save" id="save2" class="btn btn-success"/>
			</form>
			<script>

CKEDITOR.replace('editor1');

</script>