<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
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
    
    </style>

</head>
<body> 
    
</body>
</html>
  

<?php
session_start();

if(isset($_SESSION['cart'])){
  $cart=$_SESSION['cart'];
  $cart_count=count($cart);
}
else{
  $cart_count= 0;
}

$conn = new mysqli('localhost','root','','acmegrade');
if($conn->connect_error)
{
 echo "SQL ERROR";
 die;
}

$cmd = "select * from prod";
$sql_res = mysqli_query($conn,$cmd);
$row_count=mysqli_num_rows($sql_res);

echo "<div class='jumbotron bg-primary' > 
          
         <h1 class='text-center jumbotron-text text-white'> View Products </h1>
         
         <div class='d-flex justify-content-end'>
             <a class ='px-4 cart-parent' href='client_view_cart.php' >
                  <button class=' btn bg-warning'> <i class=' text-success fa fa-3x fa-shopping-cart'> </i> </button>
                  <span class='cart-count text-center'> $cart_count </span>
                  
             </a>

             <a class=' ' href='logout.php'>
                <button class=' btn bg-danger'> <i class='text-white fa fa-3x fa-power-off'> </i></buttons>

             </a>

        </div>

      </div>";

echo "<div class='d-flex flex-wrap'>";

for($i=0;$i<$row_count;$i++){
    $row=mysqli_fetch_assoc($sql_res);
    
    $pid = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $detail= $row['details'];
    $imname = $row['imname'];
 
    echo "<div class='child mt-3 ml-3' style='width:300px'>
          
       <div class='d-flex justify-content-between'>
          <h3>$name</h3>
          <h3>Rs. $price</h3>
       </div>
          
      <img src='$imname' style='width:100%'>

          <a href='addtocart.php?pid=$pid'>

          <button class='btn btn-primary w-100'>Add to Cart </button>
    
         </a>
    
    
    </div>";
}

echo "</div>";

?>