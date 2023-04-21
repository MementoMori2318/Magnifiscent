<?php

    // Start session
    session_start();

    require_once('includes\db.php');
    require_once('includes\component.php');
    require('includes\cart.inc.php');
    // Create instance of Createdb class
    // if(isset($_SESSION("useruid"))){
        // if (isset($_POST['add'])) {
        //     $product_id = $_POST['add'];
        //     if (isset($_SESSION['cart'])) {
        //         $item_array_id = array_column($_SESSION['cart'], "product_id");
        //         if(in_array($product_id, $item_array_id)){
        //             echo'<script>alert("Product is already added in the cart")</script>';
        //             echo'<script>window.location ="product.php"</script>';
        //         } else {
        //             $count = count($_SESSION['cart']);
        //             $item_array = array(
        //                 'product_id' => $product_id
        //             );
        //             $_SESSION['cart'][$count] = $item_array;
        
        //             // Insert into cartdb table
        //             $user_id = $_SESSION['users_id'];
        //             $quantity = 1; // You can modify this based on how you want to handle quantity
        //             $date = date('Y-m-d H:i:s');
        //             $query = "INSERT INTO cartdb (product_id, users_id, quantity, date) VALUES (?, ?, ?, ?)";
        //             $stmt = mysqli_stmt_init($conn);
        //             if (!mysqli_stmt_prepare($stmt, $query)) {
        //                 // Handle error
        //             } else {
        //                 mysqli_stmt_bind_param($stmt, "iiis", $product_id, $users_id, $quantity, $date);
        //                 mysqli_stmt_execute($stmt);
        //             }
        //         }
        //     } else {
        //         $item_array = array(
        //             'product_id' => $product_id
        //         );
        
        //         // Create new session variable
        //         $_SESSION['cart'][0] = $item_array;
        
        //         // Insert into cartdb table
        //         $users_id = $_SESSION['useruid'];
        //         $quantity = 1; // You can modify this based on how you want to handle quantity
        //         $date = date('Y-m-d H:i:s');
        //         $query = "INSERT INTO cartdb (product_id, users_id, quantity, date) VALUES (?, ?, ?, ?)";
        //         $stmt = mysqli_stmt_init($conn);
        //         if (!mysqli_stmt_prepare($stmt, $query)) {
        //             // Handle error
        //         } else {
        //             mysqli_stmt_bind_param($stmt, "iiis", $product_id, $users_id, $quantity, $date);
        //             mysqli_stmt_execute($stmt);
        //         }
        //     }
        // }
    // }

    
    function getData($conn, $limit = null){
        $sql = "SELECT * FROM Products";
        if($limit){
            $sql .= " LIMIT " . $limit;
        }
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
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
    <?php require("header.php")?>
    <!-- START Product -->
    <div class="container">
        <div class="row">
           <?php
           $result = getData($conn, 5);
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'],$row['product_price'],$row['product_image'],$row['id'], $conn); 
            } 
           ?>
        </div>
    </div>
    <!--END Product -->
</body>
</html>