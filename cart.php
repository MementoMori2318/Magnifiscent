<?php 
    // Start session
    session_start();

    require_once('db.php');
    require_once('./component.php');

    // Create instance of Createdb class
    $database = new db("Magnifiscent", "Products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Cart</title>
</head>
<body>
    <?php require("header.php")?>
    <div class="container">
        
        <div class="cart-item-container">
        <h3 class="your-cart">Your cart</h3>
            <?php

                if(isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'],"product_id");

                    $result = $database->getData();
                    while($row = mysqli_fetch_assoc($result)){
                       foreach($product_id as $id){
                        if($row['id'] == $id){
                            cartElement($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
                        }
                       }; 
                    } 
                } else {
                    echo "<h2>Your cart is empty shop now!></h2>";
                }
               

            ?>
        </div>
        <div class="total-item-container">
            <h3>Order Summary</h3>
        </div>
    </div>
</body>
</html>

