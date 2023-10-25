<?php

session_start();
include_once 'database.php';
if(!isset($_SESSION['admin'])){
  header("Location:../login.php");
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title><title>Admin Dashboard</title><link rel="icon" href="../img/favicon2.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
 <?php include_once 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer Feedbacks and Massages
        <small>Customers details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Massages</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


       <div class="row">
        <div class="col-xs-12">


          <?php 



if (isset($_GET['delmsg'])) {
  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Deleted!</h4>
               Massage deleted successfully.
              </div>';
  # code...
} 


if (isset($_GET['readmsg'])) {
  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>Done!</h4>
                Massage marked as read.
              </div>';
  # code...
}







?>
          
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Massages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Massage</th>
                  <th>Date & Time</th>
                  
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>


                  <?php

                  $sql = "SELECT * FROM massage where status!=3";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      echo "<tr "; if($row["status"]==0){echo "style='background-color:#428bca;color:white'";} echo "><td> " . $row["name"]. " </td><td> " . $row["email"]. " </td><td> " . $row["msg"]. "</td><td>" . $row["date"]. "</td><td>
                      <a href='massage.php?del=". $row["id"]."'><small class='label  bg-red'>Delete</small></a>";


                      if($row['status']!=2){
                      echo"


                      <a href='massage.php?read=". $row["id"]."'><small class='label  bg-yellow'>Mark as Read</small></a> "; }



                      echo "



                      </td></tr>";
                       }
                                  }

                  ?>


                </tbody>
                <tfoot>
                 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

<?php

if(isset($_GET['del'])){

  $did = $_GET['del'];

  $sql = "UPDATE massage set status=3 where id = '".$did."'";

   try {


                  if ($conn->query($sql) === TRUE) {
                         echo '<script type="text/javascript"> window.location.href = "./massage.php?delmsg='.$did.'"</script>';
                         //header('Location:./order.php?dispatchmsg='.$did);
                      } else {
                            }
                    
                  } catch (Exception $e) {
                    
                  }} 


if(isset($_GET['read'])){

  $did = $_GET['read'];

  $sql = "UPDATE massage set status=2 where id = '".$did."'";

   try {


                  if ($conn->query($sql) === TRUE) {
                         echo '<script type="text/javascript"> window.location.href = "./massage.php?readmsg='.$did.'"</script>';
                         //header('Location:./order.php?dispatchmsg='.$did);
                      } else {
                            }
                    
                  } catch (Exception $e) {
                    
                  }}

?>
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
    <?php
    include_once('footer.php');
  ?>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>  
        
            var v = document.getElementById("massage"); 
            v.className += "active"; 
        
    </script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>