<?php 
    // Start session
    session_start();

    require_once('includes\db.php');
    require('includes\cart.inc.php');
    require_once('includes\functions.inc.php');
    // Create instance of Createdb class
    
    if(isset($_POST['delete'])){
        if($_GET['action'] == 'delete'){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['product_id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
    
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
    
                displayCartItems($conn);
            ?>
        </div>
        <div class="total-item-container">
            <h3>Order Summary</h3>
            <hr>
            <div class="order-sum">
                <?php
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "<h3>Subtotal($count items)</h3>";
                } else {
                    echo "<h3>Subtotal(0)</h3>";
                }
                ?>
                <h3><?php 
                 if(isset($_SESSION['cart'])){
                    echo "₱$total";
                } else {
                    echo "₱0.00";
                }
                ?></h3>
            </div>
                <h3>Shipping Fee</h3>
            <div class="total">
                <h3>Subtotal</h3>
                <h3><?php 
                 if(isset($_SESSION['cart'])){
                    echo "₱$total";
                } else {
                    echo "₱0.00";
                }
                ?></h3>
            </div>  
                
           
        </div>
    </div>
   
    <script src="script.js"></script>
</body>
</html>

