<?php
ob_start();
function addToCart($conn)
{
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['userid'])) {
            $product_id = $_POST['add_to_cart'];
            $user_id = $_SESSION['userid'];
            $date = date('Y-m-d H:i:s');

            $sql = "SELECT * FROM cart WHERE product_id=? AND users_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $product_id, $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $num_rows = $result->num_rows;

            if ($num_rows == 0) {
                // Product doesn't exist in cart, insert new row
                $sql = "INSERT INTO cart (product_id, product_quantity, users_id, date) VALUES (?, 1, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iii", $product_id, $user_id, $date);
                $stmt->execute();

                // Update cart_total in cart
                $sql = "SELECT SUM(product_quantity) AS total FROM cart WHERE users_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $cart_total = $row['total'];
                $sql = "UPDATE cart SET cart_total=? WHERE users_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $cart_total, $user_id);
                $stmt->execute();

                // Update cart_total in customer table
                $sql = "UPDATE customer SET cart_total=? WHERE usersid=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $cart_total, $user_id);
                $stmt->execute();

                // Update $_SESSION['cart_total']
                $_SESSION['cart_total'] = $cart_total;
               

?>
<script>
    swal({
        title: "Great!",
        text: "Successfully added to the cart!",
        icon: "success",
        button: "OK",
    }).then(() => {
       
        window.location.reload();
    });
</script>

<?php

            }
        } else {
            header("Location: login.php");
            exit();
        }
    }
}




function getProduct($conn)
{
    // get product data from database
    $sql = "SELECT * FROM Products ";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        echo  " <div class='products'>
            <form method='POST'>
               
                <a href='product_details.php?product_id=" . $row['id'] . "' class='card'>
                <div class='card-img'> <img src='" . $row['product_image'] . "' alt='Image1' class='img'></div>
                <div class='card-info'>
                    <p class='text-title'>" . $row['product_name'] . "</p>
                    <p>by: ".$row['product_brand']."</p>
                    <p>for: ".$row['product_gender']."</p>
                </div>
                <div class='card-footer'>
                    <span class='text-title'>₱" . $row['product_price'] . ".00</span>
                <form action='" . addToCart($conn) . "' method='POST'>
                    <button id='addButton' class='card-button' type='submit' name='add_to_cart' value='" . $row['id'] . "'>
                        <svg class='svg-icon' viewBox='0 0 20 20'>
                        <path d='M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z'></path>
                        <path d='M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z'></path>
                        <path d='M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z'></path>
                        </svg>
                    </button>
                    <input type='hidden' name='product_id' value='" . $row['id'] . "'/>
                </form>
                </div>
                </a>
               
            </form>
        </div>";
    }
}



if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['userid'];

    // Get the current product quantity before deleting the item from the cart
    $sql = "SELECT product_quantity FROM cart WHERE users_id=? AND product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $product_quantity = $row['product_quantity'];

    // Delete the item from the cart
    $delete_sql = "DELETE FROM cart WHERE users_id=? AND product_id=?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("ii", $user_id, $product_id);
    $delete_stmt->execute();

    if ($delete_stmt->affected_rows > 0) {
        // Update the cart_total after deleting the item from the cart
        $sql = "SELECT SUM(product_quantity) AS total FROM cart WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $cart_total = $row['total'];
        $sql = "UPDATE cart SET cart_total=? WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cart_total, $user_id);
        $stmt->execute();

        // Update the cart_total in the customer table
        $sql = "UPDATE customer SET cart_total=? WHERE usersid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cart_total, $user_id);
        $stmt->execute();

        // Update the session cart_total variable
        $_SESSION['cart_total'] = $cart_total;

        header("Location: cart.php");
    }
}


function displayCartItems($conn)
{
    if (isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];

        $sql = "SELECT * FROM cart WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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
                $product_quantity = $row['product_quantity'];
                $product_brand = $product_row['product_brand'];

                echo "<div class='cart-items'>
                <div class='img' >
                    <img src='$product_image' alt='image'>
                </div>
                <div class='product-info'>
                    <h5 class='title'>$product_name</h5>
                    <p>by: $product_brand</p>
                    
                </div>
                <div class='delete-btn'>
                <h5 class='price'>₱$product_price</h5>       
                </div>  
                <div class='counter'>
                    <form action='cart.php?action='" . update_quantity($conn) . "' method='POST'>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <button class='minus-btn' type='submit' name='minus' data-product-id='$product_id'>
                            <i class='fas fa-minus'></i>
                        </button>
                        <input type='text' name='quantity' value='$product_quantity' class='count' data-product-id='$product_id'>
                        <button class='plus-btn' type='submit' name='plus' data-product-id='$product_id'>
                        <i class='fas fa-plus'></i>
                        </button>
                    </form>
                    <div class='tooltip'>
                    <form action='cart.php?action=delete&id=$product_id' method='POST' >
                        <button class='delete-btn fa fa-trash ' type='submit' name='delete' data-product-id='$product_id'></button>
                        <span class='tooltiptext'>remove</span>
                    </form>
                </div>
                </div>
                    </div>";
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
    }
     ?>
        <script>
const minusBtns = document.querySelectorAll('.minus-btn');
const plusBtns = document.querySelectorAll('.plus-btn');
const counters = document.querySelectorAll('.count');

minusBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    const product_id = btn.dataset.productId;
    const counter = document.querySelector(`.count[data-product-id='${product_id}']`);
    const currentCount = parseInt(counter.value);
    if (currentCount > 1) {
      counter.value = currentCount - 1;
      updateQuantity(counter);
    }
  });
});

plusBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    const product_id = btn.dataset.productId;
    const counter = document.querySelector(`.count[data-product-id='${product_id}']`);
    const currentCount = parseInt(counter.value);
    counter.value = currentCount + 1;
    updateQuantity(counter);
  });
});

function updateQuantity(counter) {
  const product_id = counter.dataset.productId;
  const new_quantity = counter.value;

  const form = counter.closest('.counter').querySelector('form');
  form.action = `cart.php?action=update&id=${product_id}`;

  // Save the new quantity to localStorage with a unique key for each product
  const storageKey = `quantity_${product_id}`;
  localStorage.setItem(storageKey, new_quantity);

  // Submit the form to update the quantity
  form.submit();
}

// Restore the saved quantities on page load
window.addEventListener('load', () => {
  counters.forEach(counter => {
    const product_id = counter.dataset.productId;
    const storageKey = `quantity_${product_id}`;
    const saved_quantity = localStorage.getItem(storageKey);
    if (saved_quantity) {
      counter.value = saved_quantity;
    }
  });
});

// Reset quantity to 1 when an item is deleted
const deleteButtons = document.querySelectorAll('.delete-btn');
deleteButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const counter = btn.closest('.counter').querySelector('.count');
    const product_id = counter.dataset.productId;
    const storageKey = `quantity_${product_id}`;
    localStorage.removeItem(storageKey);
  });
});

            </script>
            <?php
}

// increment and decrement function
function update_quantity($conn)
{
    if (isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];

        // decrement
        if (isset($_POST['minus'])) {
            $product_id = $_POST['product_id'];
            $product_quantity = $_POST['quantity'];

            if ($product_quantity > 1) {
                $new_quantity = $product_quantity --;
                $sql = "UPDATE cart SET product_quantity=? WHERE product_id=? AND users_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iii", $new_quantity, $product_id, $user_id);
                $stmt->execute();
            }
        }

        // increment
        if (isset($_POST['plus'])) {
            $product_id = $_POST['product_id'];
            $product_quantity = $_POST['quantity'];

            $new_quantity = $product_quantity ++;
            $sql = "UPDATE cart SET product_quantity=? WHERE product_id=? AND users_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iii", $new_quantity, $product_id, $user_id);
            $stmt->execute();
        }
       
    }
}


function displayOrderSummary($conn)
{
    if (isset($_SESSION['userid'])) {
        $user_id = $_SESSION['userid'];

        $sql = "SELECT * FROM cart WHERE users_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $cart_total = 0;
            $total_price = 0;
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $product_sql = "SELECT * FROM products WHERE id=?";
                $product_stmt = $conn->prepare($product_sql);
                $product_stmt->bind_param("i", $product_id);
                $product_stmt->execute();
                $product_result = $product_stmt->get_result();
                $product_row = $product_result->fetch_assoc();

                $product_price = $product_row['product_price'];
                $product_quantity = $row['product_quantity'];

                $cart_total += $product_quantity;
                $total_price += $product_price * $product_quantity;
            }

            // Store the cart total in the session
            $_SESSION['cart_total'] = $cart_total;

            echo "<div class='order-summary'>
                    
              
                    <div class='order-sum'>
                        <p>Total Products:</p>
                        <p>$cart_total</p>
                        </div>
                        <div class='order-sum'>
                            <p>Total Price:</p>
                            <p>₱$total_price</p>
                        </div>
                    <div class='btn-con'>
                        <button class='btn'>Proceed to cheackout</button>
                    </div>
                </div>";
        }
    }
}


function productDetails($conn){
    // Retrieve the product_id from the URL
$product_id = $_GET['product_id'];

// Fetch the detailed product information from the database based on the product_id
$sql = "SELECT * FROM Products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
echo "<div class='product-container'>
<div class='img'>
    <img src='" . $row['product_image'] . "' alt='Image1' class='img'>
</div>
<div class='name'>
    <h2 class='title'>" . $row['product_name'] . "</h2>
    <div class='bg'>
        <p class='subtitle'>by: " . $row['product_brand'] . "</p>
        <p class='subtitle'>for: ".$row['product_gender']."</p>
    </div>
    <p class='details'>Enchant your senses with this captivating perfume that embodies elegance, 
    sensuality, and sophistication. The intoxicating blend of floral and woody notes creates a 
    mesmerizing fragrance that leaves a lasting impression. With its delicate yet alluring aroma, 
    this perfume captures the essence of timeless beauty and evokes a sense of confidence and allure.</p>
    <p class='price'>Price: ₱" . $row['product_price'] . ".00</p>
    <form action='" . addToCart($conn) . "' method='POST'>
<button class='btn' type='submit' name='add_to_cart' value='" . $row['id'] . "'>
Add to cart</button
<input type='hidden' name='product_id' value='" . $row['id'] . "'/>
</form>
</div>
</div>";
}