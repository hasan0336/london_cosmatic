<?php
include_once "../Model/Db_Connection.php";
$db_obj=DB_Connection::db_connect();

$footerpage="SELECT * FROM `paypal`";
$result=$db_obj->query($footerpage);

while ($row=$result->fetch_array()) {
	
	$heading=$row['paypal_email'];
	
}


?>

<form method="POST" id="myform" action="" enctype="multipart/form-data">
	
			<div class="form-group">
			<label for="Heading">PayPal Email</label>
			<input type="text" id="heading" name="heading" value="<?php echo $heading;?>" class="form-control"/>
			<div id="message"></div>
			</div>
			
			<input type="hidden" name="hidden" value="paypal" id="hidden"/>  

			<input type="submit" name="submit" value="Submit" id="save2" class="btn btn-success"/>
			</form>
          	<script type="text/javascript">
          		$(document).ready(function() {
				  $('#save2').on('click', function() {
				      var hidden = $("#hidden").val();
				      var heading = $("#heading").val();
				      
				      if (hidden!='') {
				        
				        $.ajax({
				          url: "../Controller/footer-page.php",
				          type: "POST",
				          dataType: 'json',
				          data: {
				            hidden: hidden,heading:heading
				          },
				          cache: false,
				          success: function(dataResult){
				            console.log(dataResult.res);
				            if (dataResult.res.status==200) {
				              $("#message").html(dataResult.res.msg);
				              	
				            }if (dataResult.res.status==300) {
				              $("#message").html(dataResult.res.msg);
				              	
				            }
				            
				          }
				        });
				      }
				     return false;
				  });
				});
          	</script>