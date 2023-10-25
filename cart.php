<?php

session_start();

 if (!isset($_SESSION['cart'])) {

                                            $_SESSION['cart'] = array();}


include_once 'admin/database.php';

 if (isset($_POST['submit'])) {


                                        
                                    if (isset($_POST['size'])) {

                                        if (!isset($_SESSION['cart'])) {

                                            $_SESSION['cart'] = array();

                                            $product = array("'".$_POST['submit']."'","'".$_POST['size']."'",$_POST['qty']);

                                            if(!in_array($product, $_SESSION['cart'])){
                                                array_push($_SESSION['cart'], $product);}

                                                header('Location:./cart.php');

                                            # code...
                                        }else{
                                            $product = array("'".$_POST['submit']."'","'".$_POST['size']."'",$_POST['qty']);

                                            if(!in_array($product, $_SESSION['cart'])){
                                                array_push($_SESSION['cart'], $product);}


                                               header('Location:./cart.php');
                                               

                                            
                                        # code...
                                        }
                                    }else{
                                       // 
                                        header('Location:singleproduct.php?pid='.$_POST["submit"].'&msg=s');
                                    }
                                    # code...
                                }


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
                          <p>Home/Shop/Cart list</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <?php if(isset($_SESSION['cart'])&&count($_SESSION['cart'])>0){?>
          <table class="table">
            <thead>
              <tr>
           <th style="text-align: center;">Product</th>
                                    <th  style="text-align: center;"class="p-name">Product Name</th>
                                    <th style="text-align: center;">Price</th>
                                    <th style="text-align: center;">Quantity</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;"><i class="ti-close"></i></th>
              </tr>
            </thead>
            <tbody>

             
                                <?php
                                $grand = 0;
                                 $r = array();
                                                $r=$_SESSION['cart'];

                                for($x=0;$x<count($r);$x++){
                                    echo '<tr>';

                                     $sql = "SELECT `path` FROM image WHERE Product_idProduct = ".$r[$x][0];
                $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                                   // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                     // echo '<img class="product-big-img" src="admin/img/product/'.$row["path"].'" alt="">';
                                      echo ' <td class="cart-pic first-row"><img src="admin/img/product/'.$row["path"].'" alt=""></td>';
            

                                       break;
                                   }
                                        } 

                                        $sql = "SELECT * FROM product , brand WHERE idProduct = ".$r[$x][0]." and brand.idBrand = product.Brand_idBrand ";
                $result = $conn->query($sql);

                $tot = floatval($r[$x][2]);
                

                      if ($result->num_rows > 0) {
                                   // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    
                                        echo '<td class="cart-title first-row">
                                        <h5>'.$row["title"].'</h5>
                                    </td>
                                    <td class="p-price first-row">'.$row["price"].'</td>';
                                    $price = floatval($row["price"]);
                                    
                                    $tot = ($tot*$price);
                                    $grand = $grand+$tot;
                                    //echo gettype($tot);


            
                                       
                                   }
                                        } 



                                echo ' 
                                   
                                    
                                    <td class="qua-col first-row">
                                        <div class="quantity" style="border:none">
                                            <div class="pro-qty" style="border:none">
                                                <input style="background-color:white;border:none;text-align:center" type="text" value="'.$r[$x][2].'" disabled>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">LKR '.$tot.'</td>
                                    <form method="POST" action="cartclear.php">
                                     <td class="close-td"><button style="background-color:white;border:none" type="submit" name="close" value="'.$r[$x][0].'"><i class="ti-close"></i></button></td>
                                    </form>
                                </tr>';}

                                ?>
           
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            
          <a class="btn_1" href="./">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a> <?php }else{
              echo "<h6 style='color:#428bca;text-align:center'>You dont have anything in your shopping cart</h6><br>";
            } ?>
            
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
      document.getElementById('sb').innerHTML= tt+'.00' ;
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