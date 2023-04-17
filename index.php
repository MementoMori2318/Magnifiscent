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
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" href="styles.css?version=51">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

    <title>Magnifiscent</title>
</head>
<body>

    <?php require("header.php")?>
    
    <!-- START HERO -->
    <div class="hero-container">
        <div class="hero-title">
            <h1>MagnifiScent</h1>
            <h5>Perfume is a journey that starts on the skin and continues to the soul.</h5>
            <a href="product.php">EXPLORE OUR SCENT        <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="hero-img">

        </div>
    </div>
    <!-- ENd HERO -->

    
</body>
</html>