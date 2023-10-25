
<?php

session_start();



include_once 'admin/database.php';

?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ASB Fashion</title>
  <link rel="icon" href="img/favicon2.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/nice-select.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="css/slick.css">
  <!-- swiper CSS -->
  <link rel="stylesheet" href="css/price_rangs.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-white">
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
                          <p>Home / Contact</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form method="POST" class=""   id="contactForm">
            <div class="row" style="margin-bottom: 30px;">
              <div class="col-sm-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="msg" id="message" cols="30" rows="5"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
            </div>

            <div class="row">
             
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                </div>
              </div>

              <?php

                            if(isset($_POST['contact'])){

                                $sql = 'INSERT INTO massage (name,email,msg,`date`) VALUES ("'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['msg'].'",now())';


            if ($conn->query($sql) === TRUE) {
                        echo '<small style="text-align:center;color:#428bca"> Thank you for your feedback. We will get back to you soon.</small>';


              } else {
                     echo '<small style="text-align:center;color:#428bca">Please Try Again Later</small>';
                      }
                            }



                            ?>
             
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="contact" value="contact"  class="btn_3 ">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Galle Road</h3>
              <p>Panadura</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>+94 11 22 54875</h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>ASBfashion@gmail.com</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

  <!-- subscribe_area part start-->
  <section class="instagram_photo">
    <div class="container-fluid">
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
  <!-- jquery -->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="js/swiper.min.js"></script>
  <!-- particles js -->
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <!-- slick js -->
  <script src="js/slick.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <!--<script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
</body>

</html>