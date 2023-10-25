<?php

session_start();



if(!isset($_GET['pid'])){
    header("Location:./");
}

include_once 'admin/database.php';



$itemid = $_GET['pid'];

define("pro",$itemid);

?><!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Winter</title>
  <link rel="icon" href="img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- animate CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/lightslider.min.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/all.css">
  <!-- flaticon CSS -->
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- font awesome CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- jquery plugins here-->
  <script src="js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript"> function loadmodal(){ $("#myModal").modal("show");}</script>
<script type="text/javascript"> function loadmodal2(){ $("#myModal2").modal("show");}</script>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title"><b>Warning</b></h4>
        </div>
        <div class="modal-body">
          <p>Product already in the cart</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title"><b><li class="fa fa-check" ></li> Success</b></h4>
        </div>
        <div class="modal-body">
          <p>Product added to cart</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</head>

<body class="bg-white">
   <!--::header part start::-->
  <?php include_once 'include/header.php'; 
 // include_once 'sessioncart.php';?>
    <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Home/Shop/ product</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-5">
          <div class="product_slider_img">
            <div id="vertical">
              <?php 
                $sql = "SELECT `path` FROM image WHERE Product_idProduct = $itemid ";
                $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                                   // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                      echo '<div data-thumb="admin/img/product/'.$row["path"].'">
                <img src="admin/img/product/'.$row["path"].'" />
              </div>';

                                       
                                   }
                                        } 





              ?>
              
              
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <?php 
                $sql = "SELECT * FROM product , brand WHERE idProduct = $itemid and brand.idBrand = product.Brand_idBrand ";
                $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                                   // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                      echo '<h3>'.$row["title"].'</h3><hr>
            <h2>LKR '.$row["price"].'</h2>
            <ul class="list">
              <li>
                <a class="active" href="category.php?cat='.$row["category"].'">
                  <span>Category</span> : '.$row["category"].'</a>
              </li>
              <li>
                <a class="" href="#">
                  <span>Color</span> : '.$row["color"].'</a>
              </li>
              <li>
                <a class="" href="#">
                  <span>Brand</span> : '.$row["brandname"].'</a>
              </li>
              <li>
                <a href="#"> <span>Availibility</span> : In Stock</a>
              </li>
            </ul> 
            <p>
                '.$row["description"].'
            </p>';

                                       
                                   }
                                        } 





              ?>

          
            
            
           <form method="POST" action="./cart.php" >
               <?php echo '<input style="display:none" type="text" name="pid" value="'.pro.'">'; ?>
              
                 <div class="row" style="display: flex;">
                                    <div class="col-lg-2">
                                        <input name="size" value="sm" type="radio" id="sm-size">
                                        <label for="sm-size">S</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <input name="size" value="md"  type="radio" id="md-size">
                                        <label for="md-size">M</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <input name="size" value="lg" type="radio" id="lg-size">
                                        <label for="lg-size">L</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <input name="size" value="xl" type="radio" id="xl-size">
                                        <label for="xl-size">XS</label>
                                    </div>
                                </div>
                                 <?php

                                if (isset($_GET['msg'])&&$_GET['msg']=='s') {

                                    echo "<h6 style='color:#428bca'>Please select the size</h6><br>";

                                    # code...
                                }


                                ?><hr>
              <div class="product_count d-inline-block">
                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
               
                <input name="qty" class="input-number" type="text" value="1" min="0" max="10" style="border:none;text-align: center;">
                <span class="number-increment"> <i class="ti-plus"></i></span>
              </div><hr>
              <div class="add_to_cart">
                <button name="submit" type="submit" class="btn_3" value=<?php echo "'".$_GET['pid']."'"; ?> >Add to Cart </button>
                  
                 
              </div>
             
            </div></form>


          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->

  <!--================End Product Description Area =================-->

  <!-- product_list part start-->
  <section class="product_list best_seller padding_bottom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Best Sellers</h2>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="img/category/category_2.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="img/category/category_3.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="img/category/category_4.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="img/category/category_5.png" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="single-product.html"><h5>Long Sleeve TShirt</h5></a>
                          <p>$150.00</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section>
  <!-- product_list part end-->

  <!-- shipping details part end-->
  
  <!-- shipping details part end-->

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


  <!-- easing js -->
  <script src="js/jquery.magnific-popup.js"></script>

  <!-- swiper js -->
  <script src="js/lightslider.min.js"></script>
  <!-- swiper js -->
  <script src="js/mixitup.min.js"></script>
  <script src="js/lightslider.min.js"></script>
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

 

  <?php function mod(){echo "<script type='text/javascript'> loadmodal(); </script>";}?>
  <?php function mod2(){echo "<script type='text/javascript'> loadmodal2(); </script>";}?>
</body>

</html>