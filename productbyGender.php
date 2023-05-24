<?php
    // Start session
    session_start();
    require_once('includes/db.php');
    require('includes/cart.inc.php');
    require('includes/getByGender.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="product.css" href="styles.css?version=51">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/check-o.css' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title></title>
</head>
<body>
    <?php require("header.php"); ?>
    
    <!-- START Product -->
    <div class="container">
        <div class="row">
           <?php
               getProductByGender($conn, $gender); 
           ?>
        </div>
    </div>
    <!--END Product -->
    
   
</body>
</html>