<?php
session_start();
include_once "../Model/Db_Connection.php";
include_once "../Model/Slider.php";
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
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
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
      <?php $page = "homesetting.php"; include_once 'View/navigation.php'?>
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
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card ">
                <div class="card-header bg-primary">
                  <h3 class="card-title">
                   
                    Edit Index Page
                  </h3>
                  <div class="card-tools">
                   
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table class="table">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Heading</th>
                          <th>URL</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Price($)</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                        <?php
                            $obj_db=Db_Connection::db_connect();
                            $selct_slider="select * from `home_images`";
                            $result=$obj_db->query($selct_slider);
                          
                          if(!$result){
                              echo $obj_db->error;
                          }
                           while($row=$result->fetch_array()){
                               $photoidd=$row['id'];
                               $photo=$row['image_name'];
                               $Heading=$row['name'];
                               $title=$row['title'];
                               $Description=$row['description'];
                               $Dimension=$row['price'];
                          ?>
                        <tr>
                          <td>
                              <?php 
                              if($photo != ""){?>
                            <img src="../assets/images2/<?php echo $photo;?>" class="img-responsive" width="50"/> <a href="#" data-imgid3="<?php echo $photoidd;?>" class="singalimage3" id="singleimage3"><span class="fa fa-edit"></span></a></td>
                         <?php }?>
                          <td><?php echo $Heading;?></td>
                          <td><?php echo '../assets/images2/'.$photo;?></td>
                          <td><?php echo $title;?></td>
                          <td style="display: block; width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" ><?php echo $Description;?></td>
                          <td><?php echo $Dimension;?></td>
                          <td>
                            <?php
                            if($title != "" && $Description != "" && $Dimension != "")
                            {?>
                              <a href="#" class="btn btn-success hpeg12" data-imgid3="<?php echo $photoidd;?>" data-dim="<?php echo $Dimension;?>" data-heading="<?php echo $title;?>" data-des="<?php echo $Description;?>" ><span class="fa fa-edit"> Edit</span></a>
                            <?php }?>
                            </td>
                        </tr>
                       <?php   } ?>
                  </table>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->



              <div class="card ">
                <div class="card-header bg-primary">
                  <h3 class="card-title">
                   
                    Edit Index Page Heading
                  </h3>
                  <div class="card-tools">
                   
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table class="table">
                      <thead>
                        <tr>
                          <th>Heading</th>
                          <th>Heading1</th>
                          <th>Heading2</th>
                          <th>Heading3</th>
                          <th>Heading4</th>
                          <th>Heading5</th>
                          <th>Heading6</th>
                          <th>Paragraph1</th>
                          <th>Paragraph2</th>
                          <th>Links</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                        <?php
                            $obj_db=Db_Connection::db_connect();
                            $selct_slider="select * from `home_images`";
                            $result=$obj_db->query($selct_slider);
                          
                          if(!$result){
                              echo $obj_db->error;
                          }
                           while($row=$result->fetch_array()){
                               $photoidd=$row['id'];
                               $Heading=$row['name'];
                               $h1=$row['h1'];
                               $h2=$row['h2'];
                               $h3=$row['h3'];
                               $h4=$row['h4'];
                               $h5=$row['h5'];
                               $h6=$row['h6'];
                               $p1=$row['p1'];
                               $p2=$row['p2'];
                               $a=$row['a'];
                          ?>
                        <tr>
                          <td><?php echo $Heading;?></td>
                          <td><?php echo $h1;?></td>
                          <td><?php echo $h2;?></td>
                          <td><?php echo $h3;?></td>
                          <td><?php echo $h4;?></td>
                          <td><?php echo $h5;?></td>
                          <td><?php echo $h6;?></td>
                          <td><?php echo $p1;?></td>
                          <td><?php echo $p2;?></td>
                          <td><?php echo $a;?></td>
                          <td>
                            <?php 
                            if($h1 != "" || $h2 != "" || $h3 != "" || $h4 != "" || $h5 != "" || $h6 != "" || $p1 != "" || $p2 != "" || $a != "")
                            {?>
                               <a href="#" class="btn btn-success hpeg13" data-imgid3="<?php echo $photoidd;?>" data-dim="<?php echo $Dimension;?>" data-heading1="<?php echo $h1;?>"data-heading2="<?php echo $h2;?>"data-heading3="<?php echo $h3;?>"data-heading4="<?php echo $h4;?>"data-heading5="<?php echo $h5;?>"data-heading6="<?php echo $h6;?>"data-paragraph1="<?php echo $p1;?>" data-paragraph2="<?php echo $p2;?>"data-link1="<?php echo $a;?>" ><span class="fa fa-edit"> Edit</span></a>
                             <?php }?>
                            </td>
                        </tr>
                       <?php   } ?>
                  </table>
                </div><!-- /.card-body -->
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
              <hr>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <!--<button type="submit" class="btn btn-success btn-flat" id="save" name="save"><i class="fa fa-check-square-o"></i> Save</button>-->
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="imgmodal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary">           
              <h4 class="modal-title" id="mydialog-title1" style="float:left;">Image Update</h4>
            </div>
             <div class="container">
                 <form action="/action_page.php">
                    
                        <div class="form-group">
                        <label for="email">Home Image</label>
                        <input type="file" class="form-control" name="imagehome" class="form-controll" >
                      </div>
                      <input type="submit" class="btn btn-default" value="Update">
                              </form> 
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
<div class="modal fade imgmodal23" id="imgmodal23">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary">           
              <h4 class="modal-title" id="mydialog-title1" style="float:left;">Image Update</h4>
            </div>
             <div class="container">
                 <form action="../Controller/slidercontroller.php" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                        <label for="email">Home Image</label>
                        <input type="file" class="form-control" name="imagehome" class="form-controll" >
                         <input type="hidden" id="hidden" class="form-control" name="imagehome1" class="form-controll" >
                      </div>
                      <input type="submit" class="btn btn-default" value="Update">
                              </form> 
                     </div>
 
                <hr>
             
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade singalimage13" id="singalimage13">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary">           
              <h4 class="modal-title" id="mydialog-title1" style="float:left;">Image Update</h4>
            </div>
             <div class="container">
                 <form action="../Controller/Indexcontroller.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="action" value="homeimage3">
                      <div class="form-group">
                      <label for="email">Home Image</label>
                      <input type="file" class="form-control" name="image_name" class="form-controll" >
                      <input type="hidden" id="hidden33" class="form-control" name="hidden33" class="form-controll" >
                      </div>
                      <input type="submit" class="btn btn-default" value="Update">
                              </form> 
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
<!--model for Edit Slider Info -->

<div class="modal fade hpegimg11" id="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">           
              <h4 class="modal-title" id="mydialog-title1" style="float:left;">Edit Index Page Info</h4>
            </div>
          <div class="container" style="padding: 0 40px 0 40px">
          
              <form action="../Controller/Indexdetailsadd.php" method="post">
                  <?php
                  //$idd=$_POST['hidden1'];
                  //$sdetails=new Slider();
                  
                  //$details=$sdetails->Getsliderdetial(3);
                  
                  ?>
                <div class="form-group">
                  <label for="heading12">Title</label>
                  <input type="text" class="form-control" name="heading12" value="" id="img_heading">
                </div>
                 <div class="form-group">
                  <label for="description1">Description</label>
                  <input type="text" class="form-control" value="" name="description1" id="img_description1">
                </div>
                 <div class="form-group">
                  <label for="imagedimension1">Price</label>
                  <input type="text" class="form-control" value="" name="imagedimension1" id="img_dimension1">
                </div>
                <input type="hidden" class="form-control" name="hidden1" id="imgid12">
                <input type="hidden" name="action" value="update_home_page_img_data">
                <input type="submit" class="btn btn-default" value="Update"/>
              </form>
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

<div class="modal fade hpegimg12" id="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">           
              <h4 class="modal-title" id="mydialog-title1" style="float:left;">Edit Heading Page Info</h4>
            </div>
          <div class="container" style="padding: 0 40px 0 40px">
          
              <form action="../Controller/Indexheadingsadd.php" method="post">
                  <?php
                  //$idd=$_POST['hidden1'];
                  //$sdetails=new Slider();
                  
                  //$details=$sdetails->Getsliderdetial(3);
                  
                  ?>
                <div class="form-group">
                  <label for="heading12">Heading 1</label>
                  <input type="text" class="form-control" name="heading1" value="" id="img_heading1">
                </div>
                <div class="form-group">
                  <label for="heading12">Heading 2</label>
                  <input type="text" class="form-control" name="heading2" value="" id="img_heading2">
                </div>
                <div class="form-group">
                  <label for="heading12">Heading 3</label>
                  <input type="text" class="form-control" name="heading3" value="" id="img_heading3">
                </div>
                <div class="form-group">
                  <label for="heading12">Heading 4</label>
                  <input type="text" class="form-control" name="heading4" value="" id="img_heading4">
                </div>
                <div class="form-group">
                  <label for="heading12">Heading 5</label>
                  <input type="text" class="form-control" name="heading5" value="" id="img_heading5">
                </div>
                <div class="form-group">
                  <label for="heading12">Heading 6</label>
                  <input type="text" class="form-control" name="heading6" value="" id="img_heading6">
                </div>
                <div class="form-group">
                  <label for="heading12">paragraph 1</label>
                  <input type="text" class="form-control" name="paragraph1" value="" id="img_paragraph1">
                </div>
                <div class="form-group">
                  <label for="heading12">paragraph 2</label>
                  <input type="text" class="form-control" name="paragraph2" value="" id="img_paragraph2">
                </div>
                 <div class="form-group">
                  <label for="description1">link</label>
                  <input type="text" class="form-control" value="" name="link1" id="img_link1">
                </div>
                <input type="hidden" class="form-control" name="hidden1" id="imgid123">
                <!-- <input type="hidden" name="action" value="update_home_page_img_data"> -->
                <input type="hidden" name="action" value="update_home_page_img_headings">
                <input type="submit" class="btn btn-default" value="Update"/>
              </form>
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
    $("#hpe").click(function(){
        $("#hpe1").modal();
    });
     $("#imgedit").click(function(){
        $("#imgmodal").modal();
    });
    
    $(".hpe12").click(function(event){
        event.preventDefault();
        var idd=$(this).data("idddd");
        $("#pwd12").val(idd);
        $("#heading").val($(this).data("heading"));
        $("#colorHeading").val($(this).data("color"));
        $("#description1").val($(this).data("des"));
        $("#imagedimension1").val($(this).data("dim"));
        $("#url1").val($(this).data("url"));
        $(".hpe1234").modal();
        
    });

    $(".hpeg12").click(function(event){
        event.preventDefault();
        var idd=$(this).data("imgid3");
        $("#imgid12").val(idd);
        $("#img_heading").val($(this).data("heading"));
        $("#img_description1").val($(this).data("des"));
        $("#img_dimension1").val($(this).data("dim"));

        $(".hpegimg11").modal();
        
    });

    $(".hpeg13").click(function(event){
        event.preventDefault();
        console.log($(this).data("heading1"));
        console.log($(this).data("heading2"));
        console.log($(this).data("heading3"));
        console.log($(this).data("heading4"));
        console.log($(this).data("heading5"));
        console.log($(this).data("heading6"));
        console.log($(this).data("paragraph1"));
        console.log($(this).data("paragraph2"));
        console.log($(this).data("link1"));
        var idd=$(this).data("imgid3");
        $("#imgid123").val(idd);
        $("#img_heading1").val($(this).data("heading1"));
        $("#img_heading2").val($(this).data("heading2"));
        $("#img_heading3").val($(this).data("heading3"));
        $("#img_heading4").val($(this).data("heading4"));
        $("#img_heading5").val($(this).data("heading5"));
        $("#img_heading6").val($(this).data("heading6"));
        $("#img_paragraph1").val($(this).data("paragraph1"));
        $("#img_paragraph2").val($(this).data("paragraph2"));
        $("#img_link1").val($(this).data("link1"));

        $(".hpegimg12").modal();
        
    });

     $(".imgedit2").click(function(event){
          event.preventDefault() ;
          var id=$(this).data("iddd");
          $("#hidden").val(id);
          $(".imgmodal23").modal();
    });

    $(".singalimage1").click(function(event){
        event.preventDefault() ;
        var imgid1=$(this).data("imgid1");
        $("#hidden11").val(imgid1);
        $(".singalimage11").modal();
    });
    $(".singalimage2").click(function(event){
        event.preventDefault() ;
        var imgid2=$(this).data("imgid2");
        $("#hidden22").val(imgid2);
        $(".singalimage12").modal();
    });
    $(".singalimage3").click(function(event){
        event.preventDefault() ;
        var imgid3=$(this).data("imgid3");
        $("#hidden33").val(imgid3);
        //$("#hidden33").val(id);
        $(".singalimage13").modal();
    });
    $(".singalimage4").click(function(event){
        event.preventDefault() ;
        var imgid4=$(this).data("imgid4");
        $("#hidden44").val(imgid4);
        //$("#hidden15").val(id);
        $(".singalimage14").modal();
    });
</script>
</body>
</html>
