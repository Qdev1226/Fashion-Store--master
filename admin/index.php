<?php
session_start();

if(isset($_SESSION['adminid'])){
	header("Location:starter.html");
}else{
	header("Location:../login.php");
}




?>