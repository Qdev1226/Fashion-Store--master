<?php

session_start();

include_once 'admin/database.php';
?>


<!doctype html>

<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" href="img/favicon2.png">
    <title>ASB Fashion</title>
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

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_slider">
                        <div class="single_banner_slider">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h5><b>ASB</b> Fashion (PVT) LTD </h5>
                                    <h1>Fashion Collection 2020</h1>
                                    <a href="javascript:scroll()"  class="btn_1">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part pt-4">
        <div class="container-fluid p-lg-0 overflow-hidden">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="img/feature_1.png" alt="#">
                        <div class="hover_text">
                            <a href="category.php?cat=Gents" class="btn_2">Shop For Gents</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="img/feature_2.png" alt="#">
                        <div class="hover_text">
                            <a href="category.php?cat=Ladies" class="btn_2">Shop For Ladies</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="img/feature_3.png" alt="#">
                        <div class="hover_text">
                            <a href="category.php?cat=Kids" class="btn_2">Shop For Kids</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- new arrival part here -->
    <section class="new_arrival section_padding" id="arrival">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>new arrival</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="arrival_filter_item filters" >
                        <ul >

                            <li class="active controls" data-filter=".all">All</li>
                            <li class="controls" data-filter=".men">men</li>
                            <li class="controls" data-filter=".women">women</li>
                            <li class="controls" data-filter=".kid">kids</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="new_arrival_iner filter-container" >

                         <?php  if(!isset($_GET['filter'])){
                                $sql = "SELECT idProduct,title,price,`path` FROM product , image where product.idProduct=image.Product_idProduct and imgid = ( SELECT MIN(imgid) from image WHERE image.Product_idProduct = product.idProduct) and product.category='Ladies' and ava = 1";
                                            $result = $conn->query($sql);
                                            $cnt = 1; 
                                if ($result->num_rows > 0) {
                                         while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;
                          echo '<div class="single_arrivel_item weidth_4 mix women all">
                            <img src="admin/img/product/'.$row["path"].'" alt="'.$row["idProduct"].'">
                            <div class="hover_text">
                                <p>New Arival</p>
                                <a href="./singleproduct.php?pid='.$row["idProduct"].'"><h6>'.$row["title"].'</h6></a>
                                <div class="rate_icon">
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR '.$row["price"].'.00</h5>
                                <div class="social_icon">
                                    
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>';
                        if($cnt>4){
                            break;
                        }} } }

                        ?>
                        <?php  if(!isset($_GET['filter'])){
                                $sql = "SELECT idProduct,title,price,`path` FROM product , image where product.idProduct=image.Product_idProduct and imgid = ( SELECT MIN(imgid) from image WHERE image.Product_idProduct = product.idProduct) and product.category='Gents' and ava = 1";
                                            $result = $conn->query($sql);
                                            $cnt = 1; 
                                if ($result->num_rows > 0) {
                                         while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;
                          echo '<div class="single_arrivel_item weidth_4 mix men all">
                            <img src="admin/img/product/'.$row["path"].'" alt="'.$row["idProduct"].'">
                            <div class="hover_text">
                                <p>New Arival</p>
                                <a href="./singleproduct.php?pid='.$row["idProduct"].'"><h6>'.$row["title"].'</h6></a>
                                <div class="rate_icon">
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR '.$row["price"].'.00</h5>
                                <div class="social_icon">
                                    
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>';
                        if($cnt>3){
                            break;
                        }} } }

                        ?>
                        <?php  if(!isset($_GET['filter'])){
                                $sql = "SELECT idProduct,title,price,`path` FROM product , image where product.idProduct=image.Product_idProduct and imgid = ( SELECT MIN(imgid) from image WHERE image.Product_idProduct = product.idProduct) and product.category='Kids' and ava = 1";
                                            $result = $conn->query($sql);
                                            $cnt = 1; 
                                if ($result->num_rows > 0) {
                                         while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;
                          echo '<div class="single_arrivel_item weidth_4 mix kid all">
                            <img src="admin/img/product/'.$row["path"].'" alt="'.$row["idProduct"].'">
                            <div class="hover_text">
                                <p>New Arival</p>
                                <a href="./singleproduct.php?pid='.$row["idProduct"].'"><h6>'.$row["title"].'</h6></a>
                                <div class="rate_icon">
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR '.$row["price"].'.00</h5>
                                <div class="social_icon">
                                    
                                    <a href="./singleproduct.php?pid='.$row["idProduct"].'"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>';
                        if($cnt>3){
                            break;
                        }} } }

                        ?>


                        







                        <!--
                        <div class="single_arrivel_item weidth_2 mix women">
                            <img src="img/arrivel/arrivel_2.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR 1500</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_3 mix shoes women" >
                            <img src="img/arrivel/arrivel_3.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR 1500</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_3 mix women ">
                            <img src="img/arrivel/arrivel_4.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR 1500</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_2 mix  women">
                            <img src="img/arrivel/arrivel_1.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR 1500</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_1 mix shoes ">
                            <img src="img/arrivel/arrivel_6.png" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>LKR 1500</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- new arrival part end -->

    <!-- free shipping here -->
    <section class="shipping_details section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_1.png" alt="">
                        <h4>Fast Delivery</h4>
                        <p>Multiple fast and secure delivery options.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_2.png" alt="">
                        <h4>Lowest Price</h4>
                        <p>High quality products for good price.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_3.png" alt="">
                        <h4>Easy Payment</h4>
                        <p>Multiple payment options.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_4.png" alt="">
                        <h4>24 7 Contact</h4>
                        <p>24 7 Customer support service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- free shipping end -->

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
    <?php  include_once 'include/footer.php'; ?>
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
        function scroll(){
        $('html, body').animate({
     scrollTop: $("#arrival").offset().top
 }, 900);}
    </script>

</body>

</html>