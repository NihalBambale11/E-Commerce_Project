<?php
   $conn = new mysqli('localhost','root','','acmegrade');
   if($conn->connect_error)
   {
    echo "SQL ERROR";
    die;
   }

   $uname = $_POST['uname'];
   $upass = $_POST['upass'];

   $q="select * from users where uname='$uname' and upass='$upass'";
   $sql_res=mysqli_query($conn,$q);
   $row_count = mysqli_num_rows($sql_res);

   if($row_count==0){
      
       echo "Invalid Login";
   }

   else if($row_count==1){
       $row= mysqli_fetch_assoc($sql_res);
       $uname=$row['uname'];
       $umobile=$row['mobile'];
       
       session_start();

       $_SESSION['uname']=$uname;
       $_SESSION['umobile']=$umobile;
       $_SESSION['uaddress']=$row['address'];

       $_SESSION['cart']=array();
       header('location:client_view_product.php');
   }
?>