<?php

$conn = new mysqli('localhost','root','','acmegrade');
if($conn->connect_error)
{
 echo "SQL ERROR";
 die;
}
  

$uname=$_GET['uname'];
$umobile=$_GET['umobile'];
$uaddress=$_GET['address'];

session_start();

$cart=$_SESSION['cart'];
for($i=0;$i<count($cart);$i++){

   $pid=$cart[$i];
   $cmd= "insert into orders(cname,cmobile,caddress,pid) values('$uname','$umobile','$uaddress', $pid)";
   

   
   $sql_status=mysqli_query($conn,$cmd);

   if(!$sql_status){
       echo"Error in executing the SQL $cmd";
       die;
   }
}

$_SESSION['cart'] = array();
header('location:client_view_product.php');


?>