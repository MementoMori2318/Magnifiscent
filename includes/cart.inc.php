<?php 
ob_start();
function addToCart($conn) {
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['add_to_cart'];
        $user_id = $_SESSION['userid'];
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
            $stmt->bind_param("iii", $product_id, $user_id, $date);
            $stmt->execute();
        }
    }
}

function getProduct($conn){
    // get product data from database
    $sql = "SELECT * FROM Products ";
    $result = mysqli_query($conn, $sql);
    while ( $row = $result->fetch_assoc()){
      echo  "<div class='products'>
        <form method='POST'>
            <div class='card'>
                <div>
                    <img src='" . $row['product_image'] . "' alt='Image1' class='img'>
                </div>
                <div class='card-body'>
                    <h5 class='title'>" . $row['product_name'] . "</h5>
                    <h5 class='price'>" . $row['product_price'] . ".00</h5>
                </div>
                    <div class='btn-container'>
                        <button class='btn' type='submit' name='buy'>Buy Now</button>
                        <form action='" . addToCart($conn) . "' method='POST'>
                        <button class='btn' type='submit' name='add_to_cart' value='" . $row['id'] . "'>Add to Cart</button>
                        <input type='hidden' name='product_id' value='" . $row['id'] . "'/>
                        </form>
                    </div>   
            </div>
        </form>
    </div>";

    }
}