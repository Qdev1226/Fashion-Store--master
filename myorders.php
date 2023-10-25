

<?php

session_start();
if(!isset($_SESSION['uid'])){
    header("Location:./login.php?redirect=myorders");
}



include_once 'admin/database.php';

   if(isset($_POST['submit'])){
                        $oid = "OD".rand(1000,9999)."TX".date("HisYmd");
                        //echo $oid;
                        $address = $_POST['add1'];
                        $address2 = $_POST['add2'];
                        $city = $_POST['city'];
                        $zip = $_POST['zip'];
                        $contact = $_POST['contact'];
                        $pay = $_POST['pay'];
                        $uid = $_SESSION['uid'];


                        $sql = "INSERT INTO orderdetail (orderid,deladdress,deladdress2,town,zip,contact,payment,cid) VALUES ('".$oid."', '".$address."', '".$address2."', '".$city."', ".$zip.", '".$contact."', '".$pay."', '".$uid."')";

            if ($conn->query($sql) === TRUE) {

                    $r = array();
                 $r=$_SESSION['cart'];

                                for($x=0;$x<count($r);$x++){
                                    $t = intval(substr($r[$x][0],1,1));
                                   // echo $t.'<br>'.$r[$x][1].'<br>'.$r[$x][2].'<br>';
                                     $sql2 = "INSERT INTO shoppingcart (orderid,productid,qty,size,amount) VALUES ('".$oid."', $t, ".$r[$x][2].",  ".$r[$x][1].",(SELECT price from product where idProduct=$t)*".$r[$x][2].")";


                                     if ($conn->query($sql2) === TRUE){

                                        unset($_SESSION['cart']);
                                        $_SESSION['cart']=array();

                                        header('Location:./myorders.php');
                                     }else{

                                     }

                                }


               
              
              } else {
                     //echo '<h3>User already exist</h3>';
                      }


}





if(isset($_GET['cancel'])){

  $cid = $_GET['cancel'];

  $sql = "UPDATE orderdetail set status='Cancelled' where orderid = '".$cid."'";

   try {


                  if ($conn->query($sql) === TRUE) {
                         echo '<script type="text/javascript"> window.location.href = "./myorders.php?cancelmsg='.$cid.'"</script>';
                         //header('Location:./order.php?dispatchmsg='.$did);
                      } else {
                            }
                    
                  } catch (Exception $e) {
                    
                  }}


if(isset($_GET['complete'])){

  $cmid = $_GET['complete'];

  $sql = "UPDATE orderdetail set status='Completed' where orderid = '".$cmid."'";

   try {


                  if ($conn->query($sql) === TRUE) {
                         echo '<script type="text/javascript"> window.location.href = "./myorders.php?completemsg='.$cmid.'"</script>';
                         //header('Location:./order.php?dispatchmsg='.$did);
                      } else {
                            }
                    
                  } catch (Exception $e) {
                    
                  }}


                                  



                               


?>
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AHN Fashion</title>
  <link rel="icon" href="img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- nice select CSS -->
  <link rel="stylesheet" href="css/nice-select.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-white">
  <!--::header part start::-->
   <?php include_once 'include/header.php';
    //include_once 'sessioncart.php'; ?>
  <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Home/Shop/Order list</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
 <div class="row">
   <div class="col-lg-12">
     <?php 



if (isset($_GET['cancelmsg'])) {
  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Cancelled!</h4>
                Order '.$_GET['cancelmsg'].' cancelled as your request.
              </div>';
  # code...
} 


if (isset($_GET['completemsg'])) {
  echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Completed!</h4>
                Order '.$_GET['completemsg'].' marked as received.
              </div>';
  # code...
}







?>
   </div>
 </div>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
           <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th >Date</th>
                                    <th>Delivery Address</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th> Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               <?php 

                               $sql ="SELECT * from orderdetail where cid = '".$_SESSION['uid']."' order by odate desc";

                               $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo '<tr>
                        <td>'.$row['orderid'].'</td>
                        <td>'.$row['odate'].'</td>
                        <td>'.$row['deladdress'].'</td>
                        <td>'.$row['payment'].'</td>
                        <td>'.$row['status'].'</td>
                        <td>';

                        if($row['status']=='Shipped'){

                             echo '   <a href="./myorders.php?complete='. $row["orderid"].'" ><small class="btn btn-regular btn-sm" style="opacity:0.5;border:1px solid;"> <b>Mark As Received</b></small></a> ';

                        }

                        if($row['status']=='In Progress'){

                             echo '   <a href="./myorders.php?cancel='. $row["orderid"].'" ><small class="btn btn-regular btn-sm" style="opacity:0.5;border:1px solid;"> <b>Cancel Order</b></small></a> ';

                        }

                       




                        echo '

                        </td>
                        </tr>';
                    }
                      }else{
                        echo "<h6 style='text-align:center;color:orange'>You dont have any orders .. !</h6><br>";
                      }

                               ?>
                               
                              
                            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="./">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

  <!--::footer_part start::-->
  <?php include_once 'include/footer.php'; ?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="js/mixitup.min.js"></script>
  <script src="js/price_rangs.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script type="text/javascript">
    
    function cal(s,l,p) {
      var d = "m"+s;
      var ds = "t"+s;
      
      var c = document.getElementById(d).value;
      //alert(s);
      //alert(l);

      var tot = c*l;
      document.getElementById(ds).innerHTML=tot.toFixed(2);
      var subtot=document.getElementById('sb').innerHTML;

      var tt = parseFloat(subtot);
      tt = tt + tot - p ;
      //alert(subtot);
      document.getElementById('sb').innerHTML= tt ;
      //var f = document.getElementById(dd);
      //var total = f.value * l ;
      //alert(f);
      //alert(s);
      //'.$index.','.$row["price"].'
      //f.innerHTML=total; 
      // body...
    }
  </script>
</body>

</html>