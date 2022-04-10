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

      <style>
         .parent{
             width: 300px;
             margin-top:30px;
             margin:20px;
             height:330px;
             padding:10px;
             background: linear-gradient(90deg, rgba(2,36,36,1) 0%, rgba(60,90,10,1) 35%, rgba(0,25,89,1) 100%);
             display:inline-block;
          }
      </style>

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

$sql_result=mysqli_query($conn,'select * from prod');

$total_rows = mysqli_num_rows($sql_result);

for($i=0;$i<$total_rows;$i++){

    $row=mysqli_fetch_assoc($sql_result);
    $pdt_id=$row['id'];
    $name=$row['name'];
    $details=$row['details'];
    $price=$row['price'];
    $imname = $row['imname'];
     

      echo "
         <div class='parent'>
             
             <div class='d-flex justify-content-between'>
               <h3 class='text-white'>$name</h3>
               <h4 class='text-white'>Rs.$price</h4> 
             </div>

            <img  class='pdt-image w-100'  src='$imname'>
            <p class='text-white'> $details </p>
           
          <div class='d-flex justify-content-around'>
               
               <a href='admin_update_product.php?pdt_id=$pdt_id'>
                   <button class='btn bg-warning'><i class='text-white fa fa-edit'></i></button>
               </a>

               <a href='delete_pdt.php?pdt_id=$pdt_id'>
                    <button class='btn bg-danger'><i class=' text-white fa fa-trash'></i></button>
               </a>
            
           </div>
      
         </div>";
  }

?>