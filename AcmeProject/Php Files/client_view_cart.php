<!DOCTYPE html>
<html lang="en">
<head>
<style>
      .cart-parent{
        position: relative;
      }
      .cart-count{
        position:absolute;
        background-color:red;
        font-size:20px;
        border-radius:50%;
        width: 30px;
        height:30px;
        right:10px;
        top:40px;
        color:white;
      }
      .back{
        background-color: lightblue;
      }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
   
</body>
</html>
<?php

$conn = new mysqli('localhost','root','','acmegrade');
if($conn->connect_error)
{
 echo "SQL ERROR";
 die;
}
   
     session_start();
echo"<div>
      <a href='client_view_product.php'>
       <button class='p-3 btn btn-primary'> <-- Back to Products </button> 
      </a>
       </div>";

     if(isset($_SESSION['cart'])){
            $cart=$_SESSION['cart'];

            $uname=$_SESSION['uname'];
            $umobile=$_SESSION['umobile'];
            $uaddress=$_SESSION['uaddress'];
 
           if(count($cart)>0){
                $cart_str = implode(",",$cart);

                $q = "select * from prod where id in ($cart_str)";

                 $sql_result =mysqli_query($conn,$q);

                 $sum=0;
                 echo"<div class ='d-flex w-100'>";

                 echo "<div class = 'd-flex flex-wrap w-75'> ";

                 while($row=mysqli_fetch_assoc($sql_result)){
                        //$pid =$row['id'];
                     $pid=$row['id'];
                     $name = $row['name'];
                     $details=$row['details'];
                     $imname = $row['imname'];
                     $price = $row['price'];

                     $sum=$sum+$price;

                     echo "<div class='child mt-3 ml-3' style='width:300px'>
          
                     <div class='d-flex justify-content-between'>
                        <h3>$name</h3>
                        <h3>Rs. $price</h3>
                      </div>
                        <img src='$imname' style='width:100%'>
              
                        <a href='removefromcart.php?pid=$pid'>
              
                        <button class='btn btn-primary w-100'>Remove from Cart </button>
                  
                       </a>
                  
                  
                  </div>";
                 
                   
                  } 
                  echo"</div>";
                  echo " <div class ='w-25 border text-center bg-warning  ' >

                          <h3>$uname</h3>
                          <h3>$umobile</h3>
                         
                         <h1 class='text-danger'>Grand Total <span class='text-success'>Rs.$sum </span> </h1> 
                         
                         <span> Deliver to this address <span>
                         <br>
                         <textarea>$uaddress</textarea>
                         <br>

                         

                               <a href='client_payment.php?uname=$uname & umobile=$umobile & address=$uaddress' >
                                 <button class='btn btn-secondary mt-3 '>Proceed To Payment</button>
                                 
                               </a>
                              
                               
                          
                         </div>
                  
                        <div>";
             }
             else{
                echo"<h1>Cart is Empty.....</h1>";
              }
     }
     else{
        echo"<h1>UNauthorised Attempt</h1>";
     }

?>