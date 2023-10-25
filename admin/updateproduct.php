<?php session_start(); 
if(!isset($_SESSION['admin'])){
  header("Location:../login.php");
}
if(!isset($_GET['update'])){
  header("Location:viewproduct.php");
}
include_once 'database.php';


$pid = $_GET['update'];

define("pidno", $pid);

$tit = '';
$pr = '';
$de = '';

$find  = 'SELECT * from product where idProduct =  '.$pid;
$resultf = $conn->query($find);
if ($resultf->num_rows > 0) {
    // output data of each row
    while($row = $resultf->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      $tit =$row["title"];
$de =$row["description"];
$pr =$row["price"];
    }
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
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
        Product Update
        <small>Product details update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
        <li class="active">Update Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content " >
 <div class="row">
 <div class="col-md-12" >
  <div class="alert alert-success alert-dismissible" style="display: none;" id="truemsg">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
            Product updated Successfully added
              </div>
          <!-- general form elements -->
          <div class="box box-primary" id="addform">
            <div class="box-header with-border">
              <h3 class="box-title"> Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                  <label for="exampleInputEmail1">Product ID</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $pid;?>">
                </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                  <label for="exampleInputPassword1">Product Title</label>
                  <input name="title" type="text" class="form-control" id="exampleInputPassword1" value=<?php echo "'".$tit."'"; ?>>
                </div>
                  </div>
                  <div class="col-md-4">
                   <div class="form-group">
                  
                 <label>Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputPassword1" value=<?php echo "'".$pr."'"; ?>>
                  
                </div>
                  </div>
                </div>

               
                


                




                     
      <div class="row">
        <div class="col-md-12">
            
              <div class="form-group">
                  <label for="editor1">Description</label>
                    <textarea id="editor1" name="des" rows="10" cols="80" placeholder="Enter the description">
                      <?php echo $de; ?>
                    </textarea>
             </div>
              <br>

         
           
        </div>



                
      </div>
      <!-- ./row -->
   
           
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button name="submit" value="submit" type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>


          <?php

          if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            
            $price = $_POST['price'];
            $des = trim($_POST['des']);
          

             try {

              $sql = "UPDATE product set title='".$title."',description = '".$des."',price= '".$price."' where idProduct = ".pidno;

              

                  if ($conn->query($sql) === TRUE) {
                         echo "<script type='text/javascript'> var x = document.getElementById('truemsg');
x.style.display='block';
var y = document.getElementById('addform');
y.style.display='none';
</script>";

                      } 




                    // File upload configuration
   
    
    // Display status message
    //echo $statusMsg;





                    //include_once 'adminpicupload.php';

                   
                    
                  } catch (Exception $e) {
                    
                  }
            # code...
          }

          ?>
          <!-- /.box -->

          
</div>
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


<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script>  
         var v = document.getElementById("product"); 
            v.className += "active"; 
            var e = document.getElementById("viewproduct"); 
            e.className += "active"; 
           
    </script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>