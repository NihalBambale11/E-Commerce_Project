<?php

$pdt_id=$_POST['pdt_id'];

if(isset($_POST['name']) && isset($_POST['details']) && isset($_POST['price'])  && isset($_POST['pdt_id']))
{

   $conn = new mysqli('localhost','root','','acmegrade');
   if($conn->connect_error)
   {
    echo "SQL ERROR";
    die;
   }

   date_default_timezone_set('Asia/Kolkata');
   $unique_name=date('d_m_Y_H_i_s_u');

   $unique_name=$unique_name.'.jpg';

   move_uploaded_file($_FILES['imname']['tmp_name'],$unique_name);

   $name=$_POST['name'];
   $details=$_POST['details'];
   $price=$_POST['price'];
   $pdt_id=$_POST['pdt_id'];

   $cmd="update prod set name='$name',details='$details',price=$price,imname='$unique_name' where id=$pdt_id";
   echo "cmd=$cmd";
   $sql=mysqli_query($conn,$cmd);

   if($sql){
       header('location:admin_view_product.php');
   }
   echo "Error=";
   echo $conn->error_get_last;

 }

 else{
     echo "<h1> Unauhorised Attempt </h1>";
 }

?>




