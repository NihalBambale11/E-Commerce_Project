<?php

$conn = new mysqli('localhost','root','','acmegrade');
if($conn->connect_error)
{
 echo "SQL ERROR";
 die;
}

$oid=$_GET['oid'];


$q = "update orders set status = 'delivered' where orderid=$oid";

$sql_status=mysqli_query($conn,$q);

if(!$sql_status ){
    echo "Failed to update the Status!....";
}

else{
    header('location:admin_view_orders.php');
}


?>