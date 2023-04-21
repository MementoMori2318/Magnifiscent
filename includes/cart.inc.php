<?php 
ob_start();
    function addToCart($conn){
        if(isset($_SESSION["useruid"])){
            if (isset($_POST['add'])) {
                $product_id = $_POST['add'];
                if (isset($_SESSION['cart'])) {
                    $item_array_id = array_column($_SESSION['cart'], "product_id");
                    if(in_array($product_id, $item_array_id)){
                        echo'<script>alert("Product is already added in the cart")</script>';
                        echo'<script>window.location ="product.php"</script>';
                    } else {
                        $count = count($_SESSION['cart']);
                        $item_array = array(
                            'product_id' => $product_id
                        );
                        $_SESSION['cart'][$count] = $item_array;
            
                        // Insert into cartdb table
                        $users_id = $_SESSION['useruid'];
                        $quantity = 1; // You can modify this based on how you want to handle quantity
                        $date = date('Y-m-d H:i:s');
                        $query = "INSERT INTO cartdb (product_id, users_id, quantity, date) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $query)) {
                            // Handle error
                        } else {
                            mysqli_stmt_bind_param($stmt, "iiis", $product_id, $users_id, $quantity, $date);
                            mysqli_stmt_execute($stmt);
                        }
                    }
                } else {
                    $item_array = array(
                        'product_id' => $product_id
                    );
            
                    // Create new session variable
                    $_SESSION['cart'][0] = $item_array;
            
                    // Insert into cartdb table
                    $users_id = $_SESSION['useruid'];
                    $quantity = 1; // You can modify this based on how you want to handle quantity
                    $date = date('Y-m-d H:i:s');
                    $query = "INSERT INTO cartdb (product_id, users_id, quantity, date) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        // Handle error
                    } else {
                        mysqli_stmt_bind_param($stmt, "iiis", $product_id, $users_id, $quantity, $date);
                        mysqli_stmt_execute($stmt);
                    }
                }
            }
        }
    }