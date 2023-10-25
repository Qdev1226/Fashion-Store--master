<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
     

      <!-- search form (Optional) -->
     
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ADMIN DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->

        <li id="overview"><a href="overview.php"><i class="fa fa-line-chart"></i> <span>Overview</span> </a></li>
        <li id="orders"><a href="order.php"><i class="fa fa-cart-plus"></i> <span>Orders</span>

<?php $sqq = 'SELECT * FROM orderdetail where status="In Progress"' ;


 $result = $conn->query($sqq);

                  if ($result->num_rows > 0) {
                    $cnt=0;
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      $cnt++;
                      
                       }echo '<small class="label pull-right bg-red">new [ '.$cnt.' ]</small>';
                                  }





?>

          






        </a> </li>
        <li id="customers"><a href="customer.php"><i class="fa fa-users"></i> <span>Customers</span> </a></li>
      

        <li id="product" class="treeview ">
          <a  class=""><i class="fa fa-cubes"></i> <span>Products</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li id="newproduct"><a href="newproduct.php"><i class="fa fa-plus-square"></i> <span>Add New Product</span></a></li>
            <li id="viewproduct"><a href="viewproduct.php"><i class="fa fa-desktop"></i> <span>View Product</span></a></li>
          </ul>
        </li>

        <!--<li id="newarival"><a href="overview.php"><i class="fa  fa-star-half-o"></i> <span>New Arival</span> </a></li>-->

             <li id="brand" class="treeview ">
          <a  class=""><i class="fa fa-apple"></i> <span>Brands</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li id="newbrand"><a href="newbrand.php"><i class="fa fa-plus-square"></i> <span>Add New Brand</span></a></li>
            <li id="viewbrand"><a href="viewbrand.php"><i class="fa fa-desktop"></i> <span>View Brand</span></a></li>
          </ul>
        </li>


        <li id="newarival"><a href="../"><i class="fa  fa-globe"></i> <span>View Website</span> </a></li>
     

        <li id="massage"><a href="./massage.php"><i class="fa fa-envelope"></i> <span>Massages</span>

        <?php $sqq = 'SELECT * FROM massage where status=0' ;


 $result = $conn->query($sqq);

                  if ($result->num_rows > 0) {
                    $cnt=0;
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      $cnt++;
                      
                       }echo '<small class="label pull-right bg-blue">'.$cnt.'</small>';
                                  }





?>
 </a></li>


        <li id="ad" class="treeview ">
          <a class="" ><i class="fa fa-user-secret"></i> <span>Admins</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li id="newadmin" ><a href="newadmin.php"><i class="fa fa-user-plus"></i> <span>Add New Admin</span></a></li>
            <li id="admin" ><a href="admin.php"><i class="fa  fa-users"></i> <span>View Admins</span></a></li>
          </ul>
        </li>


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>