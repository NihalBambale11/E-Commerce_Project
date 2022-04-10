<?php

$conn = new mysqli('localhost','root','','acmegrade');
if($conn->connect_error)
{
 echo "SQL ERROR";
 die;
}
   $uname=$_POST['uname'];
   $upass=$_POST['upass'];
   $umobile=$_POST['mobile'];
   $uaddress=$_POST['address'];


   $sql= "insert into users(uname,upass,mobile,address) values('$uname','$upass','$umobile','$uaddress')";

   $sql_status=mysqli_query($conn,$sql);

   if($sql_status){
       echo "<h1 style='color:green'> Registration Success</h1>
             <a href='client_login.html'>Login Here</a>";
   }
   else{
       echo "<h1 style='color:red'>Registraion Failed</h1>";
   }
?>