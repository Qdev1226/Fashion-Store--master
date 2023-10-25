<?php


if (!isset($_SESSION['cart'])) {

	
	

	$_SESSION['cart'] = array();

	$_SESSION['qty'] = array();

	
	 
 

	# code...
}

// add to cart
if(isset($_GET['addtocart'])){

		if(!in_array($_GET['pid'], $_SESSION['cart'])){

		array_push($_SESSION['cart'], $_GET['pid']);
		
		array_push($_SESSION['qty'], $_GET['qty']);

		//mod() ;
		mod2() ;
 
	}
	else{

		 mod() ;
		
	}
 
}

//remove product

if(isset($_GET['remcart'])){

		$key = array_search($_GET['pid'], $_SESSION['cart']);	
	     unset($_SESSION['cart'][$key]);
	     unset($_SESSION['qty'][$key]);

	     $_SESSION['qty'] = array_values($_SESSION['qty']);
	     $_SESSION['cart'] = array_values($_SESSION['cart']);

	     

	     print_r($_SESSION['qty'] );
	     print_r($_SESSION['cart'] );
 
}


//update

if(isset($_GET['update'])){

		 $key = array_search($_GET['pid'], $_SESSION['cart']);	
		 
	     $_SESSION['qty'][$key] = $_GET['qty'];
	    
 
 
}

?>