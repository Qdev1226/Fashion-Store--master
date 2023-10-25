<?php

session_start();
include_once 'admin/database.php';

if(!(isset($_SESSION['cart'])&&count($_SESSION['cart'])>0)){
 header('Location:./cart.php');
}

?>
<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AHN Fashion</title>
    <link rel="icon" href="img/favicon2.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <?php include_once 'include/header.php'; ?>
    <!-- Header part end-->

  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <p>Home / checkout</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
       <?php if(!isset($_SESSION['user'])){ echo ' <div class="returning_customer">
        <div class="check_title">
          <h2>
            Please login to checkout. Returning Customer?
            <a href="./login.php?redirect=checkout">Click here to login</a>
          </h2>
        </div>
        
      
      </div>';}else{ ?>
     
     
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-6">
            <h3>Shipping Details</h3>
            <form class="row contact_form" action="myorders.php"  method="POST" >
             
              
              <div class="col-md-12 form-group p_star">
                <input type="text" placeholder="Phone number *" class="form-control" id="number" name="contact" required />
                <span class="placeholder" ></span>
              </div>
              
             
              <div class="col-md-12 form-group p_star">
                <input type="text" placeholder="Address line 1 *" class="form-control" id="add1" name="add1" required />
                <span class="placeholder" placeholder="Address line 01"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" placeholder="Address line 2 *" class="form-control" id="add2" name="add2" required />
                <span class="placeholder" placeholder="Address line 02"></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" placeholder="Town/City *" class="form-control" id="city" name="city" required />
                <span class="placeholder" placeholder="Town/City"></span>
              </div>
             
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP *" required />
              </div>
             
             
            
          </div>
          <div class="col-lg-6">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">

                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                  <?php 
                   $carttotal = 0;

                                for($i=0;$i<count($_SESSION['cart']);$i++){

                                    $car = $_SESSION['cart'];

                                    $sq = 'SELECT title,price FROM product where idProduct='.$car[$i][0];

                                     $result = $conn->query($sq);

                //$tot = floatval($r[$x][2]);
                

                      if ($result->num_rows > 0) {
                                   // output data of each row
                                    while($row = $result->fetch_assoc()) { 

                                        $qp = $row['price']*$car[$i][2];
                                        echo ' <li>
                  <a href="#">'.$row['title'].'
                    <span class="middle">x '.$car[$i][2].'</span>
                    <span class="last">LKR '.$qp.'.00</span>
                  </a>
                </li>';
                                        //echo '<li class="fw-normal">'.$row['title'].' x '.$car[$i][2].' <span>LKR '.$qp.'</span></li>';
                                        $carttotal = $carttotal+$qp;
                                    }}

                                } ?>
                                  
               
                
              </ul><ul class="list list_2">
<?php 
               
              echo ' <li>
                  <a href="#">Subtotal
                    <span>LKR '.$carttotal.'.00</span>
                  </a>
                </li>';
                echo ' <li>
                  <a href="#">Total
                    <span>LKR '.$carttotal.'.00</span>
                  </a>
                </li>';

                                    ?>
              
               
               
               
              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" value="Bank Transfer" name="pay" checked="checked" />
                  <label for="f-option5">Bank Tranfer</label>
                  <div class="check"></div>
                </div>
                <p>
                  Please Transfer the amount to HNB Bank AC No 10002546668544 and send a copy of payment slip via email.
                </p>
              </div>
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="pay" value="Cash On Delivery" />
                  <label for="f-option6">Cash on Delivery </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  You can pay when you are get delivered. We accept cash and visa master credit or debit cards
                </p>
              </div>
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" required />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>
              <button type="submit" name="submit" value="submit" class="btn_3" >Proceed</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </section>
  <!--================End Checkout Area =================-->

  <!-- subscribe_area part start-->
  <section class="instagram_photo">
      <div class="container-fluid>
          <div class="row">
              <div class="col-lg-12">
                  <div class="instagram_photo_iner">
                      <div class="single_instgram_photo">
                          <img src="img/instagram/inst_1.png" alt="">
                          <a href="#"><i class="ti-instagram"></i></a> 
                      </div>
                      <div class="single_instgram_photo">
                          <img src="img/instagram/inst_2.png" alt="">
                          <a href="#"><i class="ti-instagram"></i></a> 
                      </div>
                      <div class="single_instgram_photo">
                          <img src="img/instagram/inst_3.png" alt="">
                          <a href="#"><i class="ti-instagram"></i></a> 
                      </div>
                      <div class="single_instgram_photo">
                          <img src="img/instagram/inst_4.png" alt="">
                          <a href="#"><i class="ti-instagram"></i></a> 
                      </div>
                      <div class="single_instgram_photo">
                          <img src="img/instagram/inst_5.png" alt="">
                          <a href="#"><i class="ti-instagram"></i></a> 
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--::subscribe_area part end::-->

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
    var x =document.getElementById('f-option4').required;
  </script>
</body>

</html>