<?php

$conn = new mysqli('localhost','root','','acmegrade');
if($conn->connect_error)
{
    echo "SQL ERROR";
    die;
}
$pdt_id=$_GET['pdt_id'];

echo "Received pdt id=$pdt_id";

$sql= mysqli_query($conn,"delete from prod where id =$pdt_id");

if($sql){
    header('location:admin_view_product.php');
}

else{
    echo"Error occured during Delete";
}

?>