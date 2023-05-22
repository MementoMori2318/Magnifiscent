<?php
// product_details.php
session_start();
require_once('includes/db.php');
require('includes/cart.inc.php');

// Retrieve the product_id from the URL
$product_id = $_GET['product_id'];

// Fetch the detailed product information from the database based on the product_id
$sql = "SELECT * FROM Products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();



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
              echo "<div>
              <h2>" . $row['product_name'] . "</h2>
              <img src='" . $row['product_image'] . "' alt='Image1' class='img'>
              <p>Brand: " . $row['product_brand'] . "</p>
              <p>Price: ₱" . $row['product_price'] . ".00</p>
              
              <!-- Add more information as needed -->
          </div>";
           ?>
        </div>
    </div>
    <!--END Product -->
   
</body>
</html>