<?php
// Start session
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
    <link rel="stylesheet" href="product_details.css" href="styles.css?version=51">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/check-o.css' rel='stylesheet'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title></title>
</head>
<body>
    <?php require("header.php"); ?>
    
    <!-- START Product -->
    <div class="container">
           <?php
              echo "<div class='product-container'>
                <div class='img'>
                    <img src='" . $row['product_image'] . "' alt='Image1' class='img'>
                </div>
                <div class='name'>
                    <h2 class='title'>" . $row['product_name'] . "</h2>
                    <p class='brand'>by: " . $row['product_brand'] . "</p>
                    <p class='details'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam assumenda 
                    veritatis facere nostrum delectus aliquam hic nulla. Unde explicabo officia 
                    repudiandae perferendis voluptas, nesciunt necessitatibus provident tempore 
                    veniam vel ipsam!</p>
                    <p class='price'>Price: ₱" . $row['product_price'] . ".00</p>
                    <form action='" . addToCart($conn) . "' method='POST'>
                <button class='btn' type='submit' name='add_to_cart' value='" . $row['id'] . "'>
                Add to cart</button
                <input type='hidden' name='product_id' value='" . $row['id'] . "'/>
                </form>
                </div>
              </div>";
           ?>
       
    </div>
    <!--END Product -->
    
   
</body>
</html>