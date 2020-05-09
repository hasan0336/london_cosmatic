<?php include_once "view/top_file.php"?>

</head>
<body>

<!--Header-->
<?php include_once "view/header.php";?>

<!-- Registor -->

<div class="container">

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<form action="Controller/usercontrolle.php" method="post">
  
  <div class="form-group">
    <label for="email">Email Address:</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd">
  </div>
  
  <input type="submit" value="Login" class="btn btn-default"/>
</form>
</div>
<div class="col-md-4"></div>
</div>

</div>
<div style="margin-top:150px;"><div>
<div class="clear"></div>
  <br/><br/>
        

<?php include_once "view/productslider.php";?>

</div>
<?php include_once "view/fotter.php"?>
<?php include_once "view/bottom_file.php"?>



</body>
</html>