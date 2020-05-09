<?php
session_start();
include_once '../Model/Product.php';
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){

		header("Location:index.php");

}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OFF THE CORVER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
     
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index1.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">OFF THE CORNER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php $page = "editproduct.php"; include_once 'View/navigation.php'?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
		<div class="col-md-12">
		<div class="card">
            <div class="alert alert-primary">Product List</div>
            <div class="card-body">
            <div class="row">
			<div class="col-md-3"></div>
            <div class=" col-md-6">
    <?php  
    
    $pro=new Product();
    if(isset($_SESSION['commonid'])){

       $pid=$_SESSION['commonid'];
    }
    $prod=$pro->GetProductById($pid);
	
    ?>
            <form action="../Controller/updateproductcontroller.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="category">Category:</label>
    <select name="category" id="category" class="form-control" required="">
    
    <?php

      $cat_obj=new Product();
      $cats=$cat_obj->ShowCategory();
      foreach($cats as $c){
      if ($c->cat_id==$prod->cat_id) {
    ?>
    
      <option value="<?php echo $c->cat_id;?>" selected><?php echo $c->product_category;?></option>
    <?php }else{ ?>
      <option value="<?php echo $c->cat_id;?>" ><?php echo $c->product_category;?></option>
    <?php }?>
       <?php }?>
    </select>
  </div>
  <div class="form-group" id="subcategory_div" style="display: none;">
      <label for="subcategory">Sub Category:</label>
      <select class="form-control" name="subcategory" id="subcategory">

      </select>
    
    </div>
  <div class="form-group">
    <label for="email">Style:</label>
    <select name="style" class="form-control" required="">
   
    <?php

    $cat_obj=new Product();
       $styles=$cat_obj->ShowStyle();
       foreach($styles as $s){
       if ($c->cat_id==$prod->style_id) {
    
    ?>
    <option value="<?php echo $s->style_id;?>" selected><?php echo $s->product_style;?></option>
    <?php }else{ ?>
    <option value="<?php echo $s->style_id;?>"><?php echo $s->product_style;?></option>
    <?php }?>
       <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="Color">Color:</label>
    <select name="color" class="form-control" required="">
    
    <?php

    $cat_obj=new Product();
       $colors=$cat_obj->ShowColor();
       foreach($colors as $c){
       if ($c->cat_id==$prod->color_id) {
    
    ?>
      <option value="<?php echo $c->color_id;?>" selected><?php echo $c->product_color;?></option>
    <?php }else{ ?>
      <option value="<?php echo $c->color_id;?>"><?php echo $c->product_color;?></option>
    <?php }?>
       <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="email">Brand:</label>
    <select name="brand" class="form-control" required="">
   
    <?php

    $cat_obj=new Product();
       $brands=$cat_obj->ShowBrand();
       foreach($brands as $b){
       if ($c->cat_id==$prod->brand_id) {
    
    ?>
    <option value="<?php echo $b->brand_id;?>" selected><?php echo $b->product_brand;?></option>
    <?php }else{ ?>
      <option value="<?php echo $b->brand_id;?>"><?php echo $b->product_brand;?></option>
       <?php }?>
       <?php }?>
    </select>
  </div>
  <div class="form-group">
    <label for="pwd">Product Name:</label>
    <input type="text" name="pname" class="form-control" id="pname" value="<?php echo $prod->product_name;?>" required="">
  </div>
  <div class="form-group">
    <label for="price">Product price:</label>
    <input type="text" name="pprice" class="form-control" id="pprice" value="<?php echo $prod->product_price;?>" required="">
  </div>
  
  <div class="form-group">
    <label for="size">Product Size:</label>
    <input type="size" name="size" class="form-control" id="psize" value="<?php echo $prod->product_size;?>" required="">
  </div>
  <div class="form-group">
    <label for="price">Product Description:</label>
    <textarea rows="10" type="text" name="pdes" class="form-control" id="pdes" value=""><?php echo $prod->product_desction;?></textarea>
  </div>
  <div class="form-group">
    <label for="image">Product Image: <span style="font-size:10px; color:gray;">Dimensions: 1200 x 1425</span></label>
    <input type="file" name="product_image" class="form-control" id="pimage">
  </div>
  <div class="form-group">
    <label for="image">Product Image: <span style="font-size:14px; color:gray;">Dimensions: 1200 x 1425</span></label>
    <input type="file" name="product_image1" class="form-control" id="pimage1">
  </div>
  <div class="form-group">
    <label for="image">Product Image: <span style="font-size:14px; color:gray;">Dimensions: 1200 x 1425</span></label>
    <input type="file" name="product_image2" class="form-control" id="pimage2">
  </div>  
  <input type="hidden" name="hiddenid" value="<?php echo $prod->proid;?>"/>
  <input type="submit" class="btn btn-default" value="Update Product">
</form>
            </div>
            </div>
            </div>
            </div>
		</div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade " id="barclay">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">          	
            	<h4 class="modal-title" id="mydialog-title1" style="float:left;"></h4>
          	</div>
          	<div class="modal-body" id="mydialog-body">

            </div>
               
                <hr>
             
          	
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<!--<button type="submit" class="btn btn-success btn-flat" id="save" name="save"><i class="fa fa-check-square-o"></i> Save</button>-->
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/config.js"></script>
<script>
$(document).ready(function() {
  $('#category').on('change', function() {
      var category_id = this.value;
      if (category_id!='') {
        $("#subcategory_div").show();
        $.ajax({
          url: "../Controller/addproduct.php",
          type: "POST",
          data: {
            cat_id: category_id,sub_cat_id:0,action:'ajax'
          },
          cache: false,
          success: function(dataResult){
            console.log(dataResult);
            if (dataResult!=false) {
              $("#subcategory").html(dataResult);
            }else{
              $("#subcategory_div").hide();
              $("#subcategory").html();
            }
            
          }
        });
      }else{$("#subcategory_div").hide();}
     
  });
});
$(document).ready(function() {
      var sub_category_id = '<?php echo $prod->subcategory;?>';
      //alert(sub_category_id);
      var category_id = '<?php echo $prod->cat_id;?>';
      if (sub_category_id>0) {
        $("#subcategory_div").show();
        $.ajax({
          url: "../Controller/addproduct.php",
          type: "POST",
          data: {
            cat_id: category_id,sub_cat_id:sub_category_id,action:'ajax'
          },
          cache: false,
          success: function(dataResult){
            console.log(dataResult);
            if (dataResult!=false) {
              $("#subcategory").html(dataResult);
            }else{
              $("#subcategory_div").hide();
              $("#subcategory").html();
            }
            
          }
        });
      }else{$("#subcategory_div").hide();}
});
</script>
</body>
</html>
