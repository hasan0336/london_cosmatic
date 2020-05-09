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
  <title>OFF THE CORNVER</title>
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
      <?php $page = "sale.php"; include_once 'View/navigation.php'?>
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
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <!--<ul class="nav nav-pills ml-auto">-->
                  <!--  <li class="nav-item">-->
                  <!--    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>-->
                  <!--  </li>-->
                  <!--  <li class="nav-item">-->
                  <!--    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>-->
                  <!--  </li>-->
                  <!--</ul>-->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
               <table class="table table-bordered">
                   <thead>
                       <tr>
                           <th>Order Number</th>
                           <th>	Date</th>
                           <th>Buyer Name</th>
                           <th>Amount</th>
                           <th>Full Details</th>
                           <th>Action</th>
                               
                           
                       </tr>
                       
                   </thead>

                   <tbody>
                    <?php
     
                         $users=new Users();
                         if(isset($_SESSION['cus_id'])){

                            $id=$_SESSION['cus_id'];
                            $users->DelUser($id);
                         }
                         
                        // $user_data=$users->GetUser();
                            $db_obj=Db_Connection::db_connect();
                                
                            $selectcust="
                            SELECT order.order_id,order.user_id,order.fullname as user_fullname,order.email as user_email,order.address,order.product_id,order.total,order.qty,order.oder_status,order.payment_status,order.sale_date,users.fullname as user_name,users.country,users.state,users.zip,users.update_date
                            FROM `order`
                            INNER JOIN `users` ON order.user_id = users.user_id
                            WHERE oder_status = 'completed' and payment_status = 'completed' ORDER BY order.order_id DESC";

                            $result=$db_obj->query($selectcust);
                            $couter=0;
                            while($row=$result->fetch_array()){
                                $couter++;
                                $user_id=$row['user_id'];
                                $order_id=$row['order_id'];
                                $product_id=$row['product_id'];
                                $fullname=$row['user_fullname'];
                                $email=$row['user_email'];
                                $address=$row['country'].', '.$row['state']. ', '.$row['zip'];
                                $total=$row['total'];
                                $oder_status=$row['oder_status'];
                                $payment_status=$row['payment_status'];
                                $state=$row['state'];
                                $zip=$row['zip'];
                                $sale_date=date('M j, Y',strtotime($row['sale_date']));
                                $update_date=date('M j, Y',strtotime($row['update_date']));
                           // }
                                
                         ?>
                       <tr>
                           <td><?php echo $order_id;?></td>
                           <td><?php  echo $sale_date;?></td>
                           <td><?php echo $fullname;?></td>
                           <td>£<?php echo $total;?>.00</td>
                           <td><button type="button" class="btn btn-info btn-sm btn-flat transact" data-orderid="<?php echo $order_id;?>" data-proid="<?php echo $product_id;?>"><i class="fa fa-search"></i> View</button></td>
                           <td><a class="btn btn-danger" href="../Controller/custdelete.php?cus_id=<?php echo $user_id;?>">Delete</a></td>
                       </tr>
                       <?php } ?>
                   </tbody>
               </table>
              </div><!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">           
              <h4 class="modal-title" id="mydialog-title1" style="float:left;">Order Items Detail</h4>
            </div>
                <div class="modal-body">
                    <p>
                      Date: <span id="date"></span>
                      <span class="pull-right">&nbsp;Order Number#: <span id="transid"></span></span> 
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Payment From: <span id="paymentFrom"></span></span> 
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <!-- <th>Product Id</th> -->
                        <th>Product</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                      </thead>
                      <tbody id="detail">
                        <tr>
                          <td><span></span></td>
                          <td colspan="3" align="right"><b>Total</b></td>
                          <td>£<span id="total"></span>.00</td>
                        </tr>
                      </tbody>
                    </table>
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
  $(function(){
    $(document).on('click', '.transact', function(e){
      e.preventDefault();
      
      var orderid = $(this).data('orderid');
      var proid = $(this).data('proid');
      $.ajax({
        type: 'POST',
        url: '../Controller/updateOrderController.php',
        data: {orderid:orderid,proid:proid,action:'view_product'},
        dataType: 'json',
        success:function(response){
          //var res =JSON.stringify(response);
          $('#transaction').modal('show');
          console.log(response.list);
          $('#date').html(response.date);
          $('#transid').html(response.transaction);
          $('#paymentFrom').html(response.paymentFrom);
          $('#detail').prepend(response.list);
          $('#total').html(response.total);
        }
      });
    });

    $("#transaction").on("hidden.bs.modal", function () {
        $('.prepend_items').remove();
    });
  });
</script>
</body>
</html>
