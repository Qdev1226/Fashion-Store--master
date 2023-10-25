<?php

session_start();

session_unset();
session_destroy();
session_start();
 $_SESSION['cart'] = array();

header("Location:./");




?>