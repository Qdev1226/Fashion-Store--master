<?php

session_start();

if(!(isset($_GET['cat'])||isset($_GET['filter']))){
    header("Location:./");
}

include_once 'admin/database.php';

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category</title>
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
                            <p>Home / Category / <?php if(isset($_GET['cat'])){ echo $_GET['cat'];}?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding border_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                      
                        </aside>

                        <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                            <div class="l_w_title">
                                <h3>Product filters</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <p>Brands</p>
<form method="GET">
                                    <?php 

                                        $sqlfilt ="SELECT distinct brandname,brand.idBrand from brand,product where brand.idBrand=(select product.Brand_idBrand from product where product.Brand_idBrand=brand.idBrand group by brandname desc having count(*) ) ";

                                         
                                            $result = $conn->query($sqlfilt);
                                            $cnt = 1; 

                                                                    if ($result->num_rows > 0) {
                                                                        
    // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;

                                                  
                        echo '<li>
                                        <input name="brand" type="radio" value='.$row['idBrand'].' aria-label="Radio button for following text input">
                                        <a >'.$row["brandname"].'</a>
                                    </li>';

                                    if($cnt>5){break;}



                                              
                                         }
                                        } 



                                    ?>
                               
                                </ul>
                                <ul class="list">

                                 

                                    <p>color</p>
                                      <?php 

                                           $scolr = 'SELECT color from product group by color order by count(color) desc';

                                         
                                            $result = $conn->query($scolr);
                                            $cntt = 1; 

                                                                    if ($result->num_rows > 0) {
                                                                        
    // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                    $cntt = $cntt+1;
                                                    

                                                  
                        echo '<li>
                                        <input name="color" type="radio" value="'.$row['color'].'" aria-label="Radio button for following text input">
                                        <a >'.$row['color'].'</a>
                                    </li>';

                                    if($cntt>5){break;}



                                              
                                         }
                                        } 



                                    ?>
                                    
                                    
                                </ul>
                                <div class="list" style="text-align: center;">
                                    <button name="filter" value="true" type="submit" class="genric-btn primary-border circle arrow">Filter<span class="lnr lnr-arrow-right"></span></button>
                                </div>
                                </form>
                            </div>
                        </aside>
                     
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu product_bar_item">
                                    <h2 id="count"></h2>
                                </div>
                              
                            </div>
                        </div>

                        <!-- ***********************************************-->

                        <?php 


                            if(isset($_GET['filter'])&&isset($_GET['color'])&&isset($_GET['brand'])){

                                $sql = "SELECT idProduct,title,price,`path` FROM product , image where product.idProduct=image.Product_idProduct and imgid = ( SELECT MIN(imgid) from image WHERE image.Product_idProduct = product.idProduct)  and  product.color='".$_GET['color']."' and ava = 1 and  product.Brand_idBrand=".$_GET['brand'] ;
                                            $result = $conn->query($sql);
                                            $cnt = 0; 

                                                                    if ($result->num_rows > 0) {
                                                                        
    // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;

                                                    echo '<div class="col-lg-4 col-sm-6">
                            <div class="single_category_product">
                                <div class="single_category_img">
                                    <img src="admin/img/product/'.$row["path"].'" alt="'.$row["idProduct"].'">
                                    <div class="category_social_icon">
                                        <ul>
                                            
                                            <li><a href="singleproduct.php?pid='.$row["idProduct"].'"><i class="ti-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="category_product_text">
                                        <h5>'.$row["title"].'</h5>
                                        <p> LKR '.$row["price"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';



                                              
                                         }
                                        } else {
                                                    echo '<div class="col-lg-12 col-sm-12" style ="text-align:center">

                                                    <p> <b> Sorry ! Currently we dont Have any items on this category.</b> </p>
                            
                        </div>'; 
                                                }echo '<script type="text/javascript"> document.getElementById("count").innerHTML="Search Results ('.$cnt.') "; </script>';

                                               
                            }



                            else if(isset($_GET['filter'])&&!isset($_GET['color'])&&isset($_GET['brand'])){

                                $sql = "SELECT idProduct,title,price,`path` FROM product , image where product.idProduct=image.Product_idProduct and imgid = ( SELECT MIN(imgid) from image WHERE image.Product_idProduct = product.idProduct) and ava = 1  and    product.Brand_idBrand=".$_GET['brand'] ;
                                            $result = $conn->query($sql);
                                            $cnt = 0; 

                                                                    if ($result->num_rows > 0) {
                                                                        
    // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;

                                                    echo '<div class="col-lg-4 col-sm-6">
                            <div class="single_category_product">
                                <div class="single_category_img">
                                    <img src="admin/img/product/'.$row["path"].'" alt="'.$row["idProduct"].'">
                                    <div class="category_social_icon">
                                        <ul>
                                            
                                            <li><a href="singleproduct.php?pid='.$row["idProduct"].'"><i class="ti-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="category_product_text">
                                        <h5>'.$row["title"].'</h5>
                                        <p> LKR '.$row["price"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';



                                              
                                         }
                                        } else {
                                                    echo '<div class="col-lg-12 col-sm-12" style ="text-align:center">

                                                    <p> <b> Sorry ! Currently we dont Have any items on this category.</b> </p>
                            
                        </div>'; 
                                                }echo '<script type="text/javascript"> document.getElementById("count").innerHTML="Search Results ('.$cnt.') "; </script>';

                                               
                            }



                            else if(isset($_GET['filter'])&&isset($_GET['color'])&&!isset($_GET['brand'])){

                                $sql = "SELECT idProduct,title,price,`path` FROM product , image where product.idProduct=image.Product_idProduct and imgid = ( SELECT MIN(imgid) from image WHERE image.Product_idProduct = product.idProduct) and  product.color='".$_GET['color']."' and ava = 1 ";
                                            $result = $conn->query($sql);
                                            $cnt = 0; 

                                                                    if ($result->num_rows > 0) {
                                                                        
    // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;

                                                    echo '<div class="col-lg-4 col-sm-6">
                            <div class="single_category_product">
                                <div class="single_category_img">
                                    <img src="admin/img/product/'.$row["path"].'" alt="'.$row["idProduct"].'">
                                    <div class="category_social_icon">
                                        <ul>
                                            
                                            <li><a href="singleproduct.php?pid='.$row["idProduct"].'"><i class="ti-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="category_product_text">
                                        <h5>'.$row["title"].'</h5>
                                        <p> LKR '.$row["price"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';



                                              
                                         }
                                        } else {
                                                    echo '<div class="col-lg-12 col-sm-12" style ="text-align:center">

                                                    <p> <b> Sorry ! Currently we dont Have any items on this category.</b> </p>
                            
                        </div>'; 
                                                }echo '<script type="text/javascript"> document.getElementById("count").innerHTML="Search Results ('.$cnt.') "; </script>';

                                               
                            }

                         

                            else if(!isset($_GET['filter'])){
                                $sql = "SELECT idProduct,title,price,`path` FROM product , image where product.idProduct=image.Product_idProduct and imgid = ( SELECT MIN(imgid) from image WHERE image.Product_idProduct = product.idProduct) and product.category='".$_GET['cat']."'and ava = 1";
                                            $result = $conn->query($sql);
                                            $cnt = 0; 

                                                                    if ($result->num_rows > 0) {
                                                                        
    // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                    $cnt = $cnt+1;

                                                    echo '<div class="col-lg-4 col-sm-6">
                            <div class="single_category_product">
                                <div class="single_category_img">
                                    <img src="admin/img/product/'.$row["path"].'" alt="'.$row["idProduct"].'">
                                    <div class="category_social_icon">
                                        <ul>
                                            
                                            <li><a href="singleproduct.php?pid='.$row["idProduct"].'"><i class="ti-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="category_product_text">
                                        <h5>'.$row["title"].'</h5>
                                        <p> LKR '.$row["price"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';



                                              
                                         }
                                        } else {
                                                    echo '<div class="col-lg-12 col-sm-12" style ="text-align:center">

                                                    <p> <b> Sorry ! Currently we dont Have any items on this category.</b> </p>
                            
                        </div>'; 
                                                }echo '<script type="text/javascript"> document.getElementById("count").innerHTML="'.$_GET['cat'].'('.$cnt.')"; </script>';

                                               
                            }

                        ?>


                          
                       
                       
                      
                        <div class="col-lg-12 text-center" >
                            <a href="#" class="btn_2" id="more">More Items</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- free shipping here -->
    <section class="shipping_details section_padding border_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_1.png" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_2.png" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_3.png" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_shopping_details">
                        <img src="img/icon/icon_4.png" alt="">
                        <h4>Free shipping</h4>
                        <p>Divided face for bearing the divide unto seed winged divided light Forth.</p>
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

</body>

</html>