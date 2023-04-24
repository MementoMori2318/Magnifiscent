<?php 
    // Start session
    session_start();

    require_once('includes\db.php');
    require('includes\cart.inc.php');
    require_once('includes\functions.inc.php');
    // Create instance of Createdb class
    if(!isset($_SESSION['userid'])) {
        // User is not logged in, redirect to login page or show error message
        header("Location: login.php");
        exit();
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
            <?php
             displayOrderSummary($conn);
            ?>
       
        </div>
    </div>
   
    <script src="script.js"></script>
</body>
</html>

