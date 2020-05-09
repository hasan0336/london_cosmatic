<?php
session_start();
include_once "../Model/UserRegister.php";
include_once "../Model/Db_Connection.php";
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
      <?php $page = "customer.php"; include_once 'View/navigation.php'?>
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
              <li class="breadcrumb-item"><a href="index1.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container">
     <div class="card">
     <div class="alert alert-primary">Customer</div>
     <div class="card-body">
     <div class="table-responsive">
     
     <table class="table table-bordered">
     <thead class="bg-primary">
     <tr>
     <th>Name</th>
     <th>Email</th>
     <th>Country</th>
     <th>State</th>
      <th>Zip</th>
      <th>Date</th>
      <th>Cart View</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>
     <?php

        $db_obj=Db_Connection::db_connect();
     $users=new Users();
     if(isset($_SESSION['cus_id'])){

        $id=$_SESSION['cus_id'];
        $users->DelUser($id);
     }
     $showproduct="SELECT * FROM `users` order by user_id DESC ";
                            $result=$db_obj->query($showproduct);
                            $total_product=mysqli_num_rows($result);
                             $start=0;
                             $limit=8;
                            if(isset($_GET['id'])){
                                $id=$_GET['id'];
                                $start=($id-1)*$limit;
                            }else{
                                $id=1;
                            }
                           
                            $page=ceil($total_product/$limit);
    
            
        $selectcust="SELECT * FROM `users` order by user_id DESC limit $start,$limit";
        $result=$db_obj->query($selectcust);
        while($row=$result->fetch_array()){
            $user_id=$row['user_id'];
            //$order_id=$row['order_id'];
            $fullname=$row['fullname'];
            $email=$row['email'];
            $country=$row['country'];
            $state=$row['state'];
            $zip=$row['zip'];
            $update_date=date('d-m-Y',strtotime($row['update_date']));
       // }
            
     ?>
     <tr>
     <td><?php echo $fullname;?></td>
     <td><?php echo $email;?></td>
     <td><?php echo $country;?></td>
     <td><?php echo $state;?></td>
     <td><?php echo $zip;?></td>
     <td><?php  echo $update_date;?></td>
     <td><a class="btn btn-primary" href="cart.php?cus_id=<?php echo $user_id;?>">Cart</a></td>
     <td><a class="btn btn-danger" href="../Controller/custdelete.php?cus_id=<?php echo $user_id;?>">Delete</a></td>
     </tr>
     <?php } ?>
     </tbody>
     </table>
     </div>
     	<div class="continer" >
                   <div class="row">
                       <div class="col-md-offset-4">
                          <nav aria-label="Page navigation example">
                              <ul class="pagination">
                             <?php
                             if($id>1){
                                 
                          
                             ?>
                            <li class="page-item"><a class="page-link" href="?id=<?php echo ($id-1);?>">Previous</a></li>
                            <?php }
                            
                            for($i=1; $i<=$page;$i++){
                                
                            
                            ?>
                            <li class="page-item"><a class="page-link" href="?id=<?php echo $i;?>"><?php echo $i;?></a></li>
                           <?php } ?>
                            
                            <?php if($id!=$page)
                            
                            
                            {
                            
                            
                            
                            ?>
                           <li class="page-item"><a class="page-link" href="?id=<?php echo ($id+1);?>">Next</a></li>
                            <?php  } ?>
                            </ul>
                            </nav>
                       </div>
                   </div>
               
</div>
     </div>
     </div>
     
     </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once 'View/footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade " id="barclay">
    <div class="modal-dialog modal-lg">
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
</body>
</html>
