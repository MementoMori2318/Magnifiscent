<?php

    // Start session
    session_start();

    require_once('db.php');
    require_once('./component.php');

    // Create instance of Createdb class
    $database = new db("Magnifiscent", "Products");

    if (isset($_POST['add'])) {
        print_r($_POST['product_id']);
        if (isset($_SESSION['cart'])) {
            print_r($_SESSION['cart']); 
        }else {
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Magnifiscent</title>
</head>
<body>
    <!-- START Product -->
    <div class="container">
        <div class="row">
           <?php
            $result = $database->getData();
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']); 
            } 
           ?>
        </div>
    </div>
    <!--END Product -->
</body>
</html>