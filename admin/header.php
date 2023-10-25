  <header class="main-header">

    <!-- Logo -->
    <a href="./overview.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ASB</b>Fashion</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ASB</b> Fashion</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->


          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>


          <?php $sqq = 'SELECT * FROM massage where status=0' ;


 $result = $conn->query($sqq);

                  if ($result->num_rows > 0) {
                    $cnt=0;
                   // output data of each row
                     while($row = $result->fetch_assoc()) {
                      $cnt++;
                      
                       }//echo '<small class="label pull-right bg-red">new [ '.$cnt.' ]</small>';
                       echo '<span class="label label-success">'.$cnt.'</span> </a>';

                       echo '  <ul class="dropdown-menu">
              <li class="header">You have '.$cnt.' unread messages</li>
              
              <li class="footer"><a href="./massage.php">See All Messages</a></li>
            </ul>
          </li>';


                                  }





?>



              
           
          
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
         
          <!-- Tasks Menu -->
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['admin']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['admin']; ?>
                  <small>Admin</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>