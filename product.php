<?php

    // Start session
    session_start();

    require_once('db.php');
    require_once('./component.php');

    // Create instance of Createdb class
    $database = new db("Magnifiscent", "Products");
    
    if (isset($_POST['add'])) {
        $product_id = $_POST['add'];
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], "product_id");
            if(in_array($product_id, $item_array_id)){
                echo'<script>alert("Product is already added in the cart")</script>';
                echo'<script>window.location ="index.php"</script>';
                $count = count($_SESSION['cart']);
                $item_array = array(
                 'product_id' => $product_id
                );
                $_SESSION['cart'][$count] = $item_array;
            } else {
               $count = count($_SESSION['cart']);
               $item_array = array(
                'product_id' => $product_id
               );
               $_SESSION['cart'][$count] = $item_array;
            }
        } else {
            $item_array = array(
                'product_id' => $product_id
            );
    
            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
        }
    }
   
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css" href="styles.css?version=51">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <!-- START Product -->
    <div class="container">
        <div class="row">
           <?php
            $result = $database->getData(5);
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']); 
            } 
           ?>
        </div>
    </div>
    <!--END Product -->
</body>
</html>