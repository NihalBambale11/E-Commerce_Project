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

$pid=$_GET['pid'];

$q="select * from prod where id= $pid";

$sql_result=mysqli_query($conn,$q);

$row=mysqli_fetch_assoc($sql_result);

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


    
    
    </div>";


?>