<?php

if(isset($_POST['name']) && isset($_POST['details']) && isset($_POST['price']) )
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

   $cmd = "insert into prod(name,details,price,imname) values('$name','$details','$price','$unique_name')";

   $sql=mysqli_query($conn,$cmd);

   if($sql){
       header('location:admin_upload_form.html');
   }

   echo $sql;
 }

 else{
     echo "<h1> Unauhorised Attempt </h1>";
 }

?>