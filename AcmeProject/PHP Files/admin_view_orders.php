
<?php
 
 include 'admin_nav.html';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
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

$cmd = "select * from orders where status='pending'";

$sql_result = mysqli_query($conn,$cmd);

echo "<table class='table table-striped'>
         <tr>
            <td> Order Id</td>
            <td> Client Name</td>
            <td> Client Mobile</td>
            <td> Ordered Product</td>
            <td> Delivery Address</td>
            <td> Action </td>
    ";



while($row=mysqli_fetch_assoc($sql_result)){

    $order_id = $row['orderid'];
    $cname = $row['cname'];
    $cmobile = $row['cmobile'];
    $pid = $row['pid'];
    $caddress = $row['caddress'];

    echo"
      
        <tr>
        <td> $order_id</td>
        <td> $cname</td>
        <td> $cmobile</td>
        <td> 
              <a target='_blank'href = 'view_single_product.php?pid=$pid'> $pid </a>
        </td>
        <td> $caddress</td>
        <td> 
            <a href='update_order_status.php?oid=$order_id'>
           <button class ='btn btn-danger'> Set as Delivered </button>
            </a>
           <td>
          
        </tr>
    ";
}

echo "</table>";

?>