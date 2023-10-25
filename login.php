<?php

session_start();
include_once 'admin/database.php';



                                if(isset($_POST['submit'])){
                                    $fname = $_POST['fname'] ;
                                    $lname = $_POST['lname'];
                                    $email = $_POST['email'];
                                    $address = $_POST['address'];
                                    $contact = $_POST['contact'];
                                    $password = md5($_POST['password']);

                                      $sql = "INSERT INTO customer (fname,lname,contact,address,email,password) VALUES ('".$fname."', '".$lname."', '".$contact."', '".$address."', '".$email."', '".$password."')";

            if ($conn->query($sql) === TRUE) {
               $_SESSION['msg']="rsuccess";
              
              } else {
                     echo "Error: " . $sql . "<br>" . $conn->error;
                      }

                                }

                                


?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
                            <p>Home / Login</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="register.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3 >Welcome Back !
                                <br> <?php if(isset($_SESSION['msg'])){ if($_SESSION['msg']=="rsuccess"){ ?> <small ><b>Register Success Please Sign In</b></small><?php } }else{ ?> <small ><b>Please Sign In</b></small>  <?php
                                } ?> </h3> 

                            <form class="row contact_form"  method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="name" name="email" 
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" 
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                   
                                    <button name="login" type="submit" value="submit" class="btn_3">
                                        log in
                                    </button>
                                   
                                </div>
                            </form>

                            <?php

                            if(isset($_POST['login'])){
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);

                                $sql = "SELECT * FROM customer WHERE email = '".$email."' AND password = '".$password."' ";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                       $_SESSION['user'] = $row['fname']." ".$row['lname'];
                       $_SESSION['uid'] = intval($row['idCustomer']);
                       if(isset($_GET['redirect'])&&$_GET['redirect']=='myorders'){
                        echo '<script type="text/javascript"> window.location.href = "./myorders.php"</script>';
                       }elseif (isset($_GET['redirect'])&&$_GET['redirect']=='checkout') {
                          echo '<script type="text/javascript"> window.location.href = "./checkout.php"</script>';
                       }
                       else{ echo '<script type="text/javascript"> window.location.href = "./"</script>';}

                       }
                                  }else{

                                    $sql3 = "SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."' ";
                  $result3 = $conn->query($sql3);

                                       if ($result3->num_rows > 0) {
                   // output data of each row
                     while($row = $result3->fetch_assoc()) {
                         $_SESSION['admin'] = $row['fname']." ".$row['lname'];
                      echo '<script type="text/javascript"> window.location.href = "./admin/overview.php"</script>';
                    

                       }
                                  }else{
                                    echo "Incorrect username or password";
                                  }

                                  }
                            }


                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

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
        <?php  include_once 'include/footer.php'; ?>
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
    <!-- swiper js -->
    
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
    <script src="js/stellar.js"></script>
    <script src="js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>