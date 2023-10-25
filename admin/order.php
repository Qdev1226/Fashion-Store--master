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
        Orders
        <small>Customers order details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Order</a></li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


       <div class="row">
        <div class="col-xs-8">
          
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order ID</th>
                  
                  <th>Date</th>
                  
                  <th>Payment Method</th>
                  <th>Delivery Adress</th>
                  <th>Contact</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php

                  $sql = "SELECT * FROM orderdetail";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      echo "<tr "; if($row["status"]=='In Progress'){echo "style='background-color:#428bca;color:white'";} echo "><td> " . $row["orderid"]. " </td><td> " . $row["odate"]. " </td><td style='width:10%' > " . $row["payment"]. "</td><td>" . $row["deladdress"]. "</td><td>" . $row["contact"]. "</td><td>" . $row["status"]. "</td><td style='width:20%'>";

                      if($row["status"]=='In Progress'){
                      echo "
                      <a  href='./order.php?id=". $row["orderid"]."&action=cancel'><small class='label  bg-red'>CANCEL</small></a>
                      <a href='./order.php?id=". $row["orderid"]."&action=ship'><small class='label  bg-orange'>DISPATCH</small></a>";}
                      else{
                        echo"<a href='./order.php?id=". $row["orderid"]."&action=view'><small class='label  bg-green'>View Order Items</small></a>";
                      }


                      echo "</td></tr>";
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

        <div class="col-xs-4">

<!--  ***********************************************************Massage****************************************************************__-->
<?php 



if (isset($_GET['dispatchmsg'])) {
  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Done!</h4>
                Order '.$_GET['dispatchmsg'].' dispatched successfully..
              </div>';
  # code...
} 


if (isset($_GET['cancelmsg'])) {
  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Cancelled!</h4>
                Order '.$_GET['cancelmsg'].' cancelled on your request.
              </div>';
  # code...
}







?>
              
              
 <!--  ***********************************************************Dispatch****************************************************************__-->           

          <?php if(isset($_GET['action'])&&$_GET['action']=='ship'){  ?>

          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h5 class="box-title">Order Dispatch : <?php echo '<b style="color:#428bca">'.$_GET['id'].'</b>' ?></h5>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Quantity</th>

                
                  
                </tr>
                </thead>
                <tbody>


                  <?php

                  $tot=0;

                  $sql = "SELECT productid,qty,amount,title FROM shoppingcart,product where product.idProduct= shoppingcart.productid and shoppingcart.orderid='".$_GET['id']."' ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      $tot = $tot+$row["amount"];
                      echo "<tr><td> " . $row["productid"]. " </td><td> " . $row["title"]. "</td><td>" . $row["qty"]. "</td><td>" . $row["amount"]. ".00</td></tr>";
                       }
                                  }

                  ?>


                </tbody>
                <tfoot>
                 
                </tfoot>
              </table>
              <br>
              <div class="row" >
                <div class="col-xs-8" style="text-align: right;">Total Amount : LKR </div>
                <div class="col-xs-4"  style="text-align: left;"><b><?php echo $tot; ?>.00</b></div>
              </div> <br>
              <div class="row" >
                <div class="col-xs-12 " style="text-align: center;">
                  <form method="GET">
                    <button type="submit" name="confirm" value=<?php echo'"'.$_GET['id'].'"'; ?> class="btn btn-block btn-primary "><b>CONFIRM DISPATCH</b></button>
                    </form>
                  </div>
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>



<?php } ?>


<!--  ***********************************************************View****************************************************************__-->



          <?php if(isset($_GET['action'])&&$_GET['action']=='view'){  ?>

          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h5 class="box-title">Order : <?php echo '<b style="color:#428bca">'.$_GET['id'].'</b>' ?></h5>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Quantity</th>

                
                  
                </tr>
                </thead>
                <tbody>


                  <?php

                  $tot=0;

                  $sql = "SELECT productid,qty,amount,title FROM shoppingcart,product where product.idProduct= shoppingcart.productid and shoppingcart.orderid='".$_GET['id']."' ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      $tot = $tot+$row["amount"];
                      echo "<tr><td> " . $row["productid"]. " </td><td> " . $row["title"]. "</td><td>" . $row["qty"]. "</td><td>" . $row["amount"]. ".00</td></tr>";
                       }
                                  }

                  ?>


                </tbody>
                <tfoot>
                 
                </tfoot>
              </table>
              <br>
              <div class="row" >
                <div class="col-xs-8" style="text-align: right;">Total Amount : LKR </div>
                <div class="col-xs-4"  style="text-align: left;"><b><?php echo $tot; ?>.00</b></div>
              </div> <br>
             
            </div>
            <!-- /.box-body -->
          </div>



<?php } ?>







<!--  ***********************************************************Cancel****************************************************************__-->


          <?php if(isset($_GET['action'])&&$_GET['action']=='cancel'){  ?>

          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h5 class="box-title">Order Cancellation : <?php echo '<b style="color:#428bca">'.$_GET['id'].'</b>' ?></h5>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Quantity</th>

                
                  
                </tr>
                </thead>
                <tbody>


                  <?php

                  $tot=0;

                  $sql = "SELECT productid,qty,amount,title FROM shoppingcart,product where product.idProduct= shoppingcart.productid and shoppingcart.orderid='".$_GET['id']."' ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      $tot = $tot+$row["amount"];
                      echo "<tr><td> " . $row["productid"]. " </td><td> " . $row["title"]. "</td><td>" . $row["qty"]. "</td><td>" . $row["amount"]. ".00</td></tr>";
                       }
                                  }

                  ?>


                </tbody>
                <tfoot>
                 
                </tfoot>
              </table>
              <br>
              <div class="row" >
                <div class="col-xs-8" style="text-align: right;">Total Amount : LKR </div>
                <div class="col-xs-4"  style="text-align: left;"><b><?php echo $tot; ?>.00</b></div>
              </div> <br>
              <div class="row" >
                <div class="col-xs-12 " style="text-align: center;">
                  <form method="GET">
                    <button type="submit" name="cancelconfirmation" value=<?php echo'"'.$_GET['id'].'"'; ?> class="btn btn-block btn-danger "><b>CONFIRM CANCELLATION</b></button>
                    </form>
                  </div>
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>



<?php } ?>










<?php 





if(isset($_GET['cancelconfirmation'])){

  $cid = $_GET['cancelconfirmation'];

  $sql = "UPDATE orderdetail set status='Cancelled' where orderid = '".$cid."'";

   try {


                  if ($conn->query($sql) === TRUE) {
                         echo '<script type="text/javascript"> window.location.href = "./order.php?cancelmsg='.$cid.'"</script>';
                         //header('Location:./order.php?dispatchmsg='.$did);
                      } else {
                            }
                    
                  } catch (Exception $e) {
                    
                  }}  



if(isset($_GET['confirm'])){

  $did = $_GET['confirm'];

  $sql = "UPDATE orderdetail set status='Shipped' where orderid = '".$did."'";

   try {


                  if ($conn->query($sql) === TRUE) {
                         echo '<script type="text/javascript"> window.location.href = "./order.php?dispatchmsg='.$did.'"</script>';
                         //header('Location:./order.php?dispatchmsg='.$did);
                      } else {
                            }
                    
                  } catch (Exception $e) {
                    
                  }} 






                  ?>


        </div>
        <!-- /.col -->
      </div>

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
        
            var v = document.getElementById("orders"); 
            v.className += "active"; 
        
    </script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>