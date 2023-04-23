<?php 
ob_start();
function addToCart($conn) {
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['add_to_cart'];
        $user_id = $_SESSION['userid'];
        echo "User ID: " . $user_id;
        $date = date('Y-m-d H:i:s');
       
        $sql = "SELECT * FROM cartdb WHERE product_id=? AND users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $product_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $num_rows = $result->num_rows;

        if($num_rows > 0){
            // Product already exists in cart, update quantity
            $row = $result->fetch_assoc();
            $new_quantity = $row['quantity'] + 1;
            $sql = "UPDATE cartdb SET quantity=?, date=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $new_quantity, $date, $row['id']);
            $stmt->execute();
        } else {
            // Product doesn't exist in cart, insert new row
            $sql = "INSERT INTO cartdb (product_id, quantity, users_id, date) VALUES (?, 1, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iis", $product_id, $user_id, $date);
            $stmt->execute();
        }
    }
}

