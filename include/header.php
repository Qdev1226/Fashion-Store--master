<header class="main_menu home_menu">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-11">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="./"> <b class="text-primary">ASB</b> Fashion </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="./">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Shop For
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="category.php?cat=Gents"> Gents</a>
                                        <a class="dropdown-item" href="category.php?cat=Ladies"> Ladies</a>
                                        <a class="dropdown-item" href="category.php?cat=Kids"> Kids</a>
                                       <!-- <a class="dropdown-item" href="single-product.html">product details</a> -->
                                        
                                    </div>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>

                               
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>

                                 <li class="nav-item">
                                    
                                </li>
                                <li class="nav-item">
                                   
                                </li>
                                <li class="nav-item">
                                    
                                </li>

                                <?php 

                                if(isset($_SESSION['user'])){

                                    ?>

                                    <li class="nav-item"> 
                                    <a class="nav-link" href="logout.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Hello ! <b><?php  echo $_SESSION['user'] ;?>&nbsp</b> &nbsp&nbsp&nbsp  Logout </a> 
                                </li>

                                    <?php


                                }else{

                                        ?>

                                        <li class="nav-item"> 
                                    <a class="nav-link" href="login.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Login </a> 
                                </li>



                                    <?php


                                }


                                ?>



                               

                                <li class="nav-item dropdown cart " style="float: right;">
                                    <a class="nav-link dropdown-toggle" href="cart.php" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="cart.php"> View Cart [ <?php if(isset($_SESSION['cart'])){echo count( $_SESSION['cart']);}else{ echo "0";}  ?> ]</a>
                                        <a class="dropdown-item" href="checkout.php">Check Out</a>
                                        <a class="dropdown-item" href="myorders.php">My Orders</a>
                                    </div>
                                    <style type="text/css">
                                                .main_menu .cart i::after {content: <?php if(isset($_SESSION['cart'])){echo "'".count( $_SESSION['cart'])."'";}else{ echo "'0'";}  ?> ;}</style>
                                </li>
                            </ul>
                        </div>
                        <!--<div class="hearer_icon d-flex">
                            <li class="dropdown cart">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> View Cart</a>
                                        <a class="dropdown-item" href="single-blog.html">Check Out</a>
                                    </div>
                                </li>

                        </div>-->
                    </nav>
                </div>
            </div>
        </div>
        <!--
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div> -->
    </header>