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
    <div class="d-flex vh-100 justify-content-center align-items-center h-100vh">
        <form enctype="multipart/form-data" method="POST" action="admin_upload_form.php" class="w-25 text-center bg-secondary p-4">
             <h2 class="text-white">Upload Products</h2>>


            <input name="name" type="text" class="form-control mt-3" placeholder="Product-Name">
            <textarea name="details" rows="5" class="form-control mt-3" placeholder="Product-Details"></textarea>
            <input name="price" class="form-control mt-3" placeholder="Product-Price">
            <input name="imname" type="file" class="form-control mt-3">
            <input type="submit" class="form-control btn btn-success mt-3">
        
        </form>
    </div>

</body>
</html>

