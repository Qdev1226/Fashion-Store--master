<?php session_start(); 
if(!isset($_SESSION['admin'])){
  header("Location:../login.php");
}
include_once 'database.php';


$sql = "SELECT MAX(idProduct) as idProduct  FROM product";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $pid= $row["idProduct"];
        $pid = $pid+1;
        
    }}

    define("pidno", $pid);
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
        Product
        <small>Product details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
        <li class="active">Add New Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content " >
 <div class="row">
 <div class="col-md-12" >
  <div class="alert alert-success alert-dismissible" style="display: none;" id="truemsg">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                New Product Successfully added
              </div>
          <!-- general form elements -->
          <div class="box box-primary" id="addform">
            <div class="box-header with-border">
              <h3 class="box-title">New Product</h3>
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
                  <input name="title" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Title">
                </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                  
                 <label>Brand</label>
                    <select class="form-control" name="brand">

                      <?php $sql = "SELECT *  FROM brand";
                          $result = $conn->query($sql);
                                          $pid =0;

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                            echo " <option value='".$row["idBrand"]."' >".$row["brandname"]."</option>";
                                            
       
                                                              }}

                                            ?>
                   
                  
                  </select>
                  
                </div>
                  </div>
                </div>

               
                

                <div class="row">
                  
                  <div class="col-md-4">
                    <div class="form-group">
                  <label for="exampleInputPassword1">Category</label>
                  <div class="row">
                    
                    <div class="col-md-4"> <div class="radio">
                    <label>
                      <input type="radio" name="cat" id="optionsRadios1" value="Gents" checked="">
                      Gents
                    </label>
                  </div></div>

                  <div class="col-md-4"> <div class="radio">
                    <label>
                      <input type="radio" name="cat" id="optionsRadios2" value="Ladies">
                      Ladies
                    </label>
                  </div></div>


                  <div class="col-md-4">  <div class="radio">
                    <label>
                      <input type="radio" name="cat" id="optionsRadios3" value="Kids" >
                      Kids
                    </label>
                  </div></div>

                  </div>
                 
                  
                 
                </div>

                

                  </div>

                  <div class="col-md-4">
                    
                    <div class="form-group">
                  
                 <label>Color</label>
                    <select class="form-control" name="color">
                    <option value="White">White</option>
                    <option value="Tan">Tan</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Orange">Orange</option>
                    <option value="Red">Red</option>
                    <option value="Pink">Pink</option>
                    <option value="Purple">Purple</option>
                    <option value="Blue">Blue</option>
                    <option value="Green">Green</option>
                    <option value="Brown">Brown</option>
                    <option value="Grey">Grey</option>
                    <option value="Black">Black</option>
               
                  </select>
                  
                </div>

                  </div>

                   <div class="col-md-4">
                    
                    <div class="form-group">
                  
                 <label>Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Enter Price">
                  
                </div>

                  </div>

                </div>

                




                     
      <div class="row">
        <div class="col-md-12">
            
              <div class="form-group">
                  <label for="editor1">Description</label>
                    <textarea id="editor1" name="des" rows="10" cols="80" placeholder="Enter the description">
                      
                    </textarea>
             </div>
              <br>

              <div class="form-group">
                  <label for="exampleInputFile">Select Images</label>
                  <input type="file" name="files[]" id="exampleInputFile" multiple >
                  <small style="color: grey">Please select 4 images for better look in the product detail page in the website</small>
                 
                </div>
           
        </div>



                
      </div>
      <!-- ./row -->
   
           
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button name="submit" value="submit" type="submit" class="btn btn-primary">Add Product</button>
              </div>
            </form>
          </div>


          <?php

          if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $brand  = $_POST['brand'];
            $cat = $_POST['cat'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $des = trim($_POST['des']);
            $size = "";

             try {

               $sql = "INSERT INTO product (title,category,color,description,price,size,Brand_idBrand) VALUES ('".$title."', '".$cat."', '".$color."','".$des."','".$price."','".$size."','".$brand."')";

                  if ($conn->query($sql) === TRUE) {
                         echo "<script type='text/javascript'> var x = document.getElementById('truemsg');
x.style.display='block';
var y = document.getElementById('addform');
y.style.display='none';
</script>";

                      } else {
                            }




                    // File upload configuration
    $targetDir = "img/product/";
    $allowTypes = array('jpg','png','jpeg','gif');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path .date("ymd").date("hisa")
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."',".pidno." , ".$brand."),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
        
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            //echo $insertValuesSQL;
           // echo $pid;
           // echo $brand;
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO image (`path`, `Product_idProduct`,`Product_Brand_idBrand`) VALUES $insertValuesSQL");
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
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
            var e = document.getElementById("newproduct"); 
            e.className += "active"; 
           
    </script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>