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
            $new_quantity = $row['product_quantity'] + 1;
            $sql = "UPDATE cartdb SET product_quantity=?, date=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $new_quantity, $date, $row['id']);
            $stmt->execute();
        } else {
            // Product doesn't exist in cart, insert new row
            $sql = "INSERT INTO cartdb (product_id, product_quantity, users_id, date) VALUES (?, 1, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iii", $product_id, $user_id, $date);
            $stmt->execute();
        }

        // Update cart_total in cartdb
        $sql = "SELECT SUM(product_quantity) AS total FROM cartdb WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $cart_total = $row['total'];
        $sql = "UPDATE cartdb SET cart_total=? WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cart_total, $user_id);
        $stmt->execute();

        // Update cart_total in customer table
        $sql = "UPDATE customer SET cart_total=? WHERE usersid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cart_total, $user_id);
        $stmt->execute();
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
                    <h5 class='price'>₱" . $row['product_price'] . ".00</h5>
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

function displayCartItems($conn) {
    if(isset($_SESSION['userid'])){
        $user_id = $_SESSION['userid'];
        
        $sql = "SELECT * FROM cartdb WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $product_id = $row['product_id'];
                $product_sql = "SELECT * FROM products WHERE id=?";
                $product_stmt = $conn->prepare($product_sql);
                $product_stmt->bind_param("i", $product_id);
                $product_stmt->execute();
                $product_result = $product_stmt->get_result();
                $product_row = $product_result->fetch_assoc();
                
                $product_name = $product_row['product_name'];
                $product_price = $product_row['product_price'];
                $product_image = $product_row['product_image'];
                
                echo "<form action='cart.php?action=delete&id=$product_id' method='POST' class='cart-items'>
                <div>
                    <img src='$product_image' alt='image'>
                </div>
                <div class='product-info'>
                    <h5 class='title'>$product_name</h5>
                    <h5 class='price'>₱$product_price</h5>
                    <button class='btn' type='submit' name='delete'>Delete</button>
                </div>
                <div>
                    <form action='' method='POST'>
                        <button class='minus-btn'><i class='fas fa-minus'></i></button>
                        <input id='' type='text' value='1' class='counter'></input>
                        <button class='plus-btn'><i class='fas fa-plus'></i></button>
                    </form>
                </div>
            </form>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
    } else {
        echo "<p>You must be logged in to view your cart.</p>";
    }
}
function displayOrderSummary($conn) {
    if(isset($_SESSION['userid'])){
        $user_id = $_SESSION['userid'];
        
        $sql = "SELECT * FROM cartdb WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            $total_products = 0;
            $total_price = 0;
            while($row = $result->fetch_assoc()){
                $product_id = $row['product_id'];
                $product_sql = "SELECT * FROM products WHERE id=?";
                $product_stmt = $conn->prepare($product_sql);
                $product_stmt->bind_param("i", $product_id);
                $product_stmt->execute();
                $product_result = $product_stmt->get_result();
                $product_row = $product_result->fetch_assoc();
                
                $product_price = $product_row['product_price'];
                
                $total_products++;
                $total_price += $product_price;
            }
            echo "<div class='order-summary'>
                    <h2>Order Summary</h2>
                    <p>Total Products: $total_products</p>
                    <p>Total Price: ₱$total_price</p>
                </div>";
       
        }
    } 
}