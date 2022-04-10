<?php
$pid=$_GET['pid'];

session_start();
$cart =$_SESSION['cart'];
$ind=array_search($pid,$cart);
array_splice($cart,$ind,1);

$_SESSION['cart']=$cart;

header('location:client_view_cart.php');
?>
