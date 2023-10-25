

<?php

session_start();



include_once 'admin/database.php';
$key=0;

if(isset($_POST['close'])){
	for($y=0;$y<count($_SESSION['cart']);$y++){


	$key = array_search($_POST['close'], $_SESSION['cart'][$y]);

	if($key>-1){
	

	unset($_SESSION['cart'][$y]);

	$_SESSION['cart'] = array_values($_SESSION['cart']);

	header('Location:./cart.php');

}
	}
	//unset($_SESSION['cart'][$key]);
	
}


?>



