
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Magnifiscent</title>
</head>
<body>
<nav>
        <div class="wrapper">
        <a href="index.php"><img src="image/logo.png" alt="Logo"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">Men</a></li>
                <li><a href="">Women</a></li>
            </ul>
            <a href="cart.php" class="cart">
    <i class='fas fa-shopping-cart'></i> 
    <span id="cart-total">
        <?php 
        if(isset($_SESSION['cart_total'])) {
            // If cart total is already set in session, use that value
            echo $_SESSION['cart_total'];
        } else {
            // Otherwise, calculate the cart total from the cart items in the database
            $user_id = $_SESSION['userid'];
            $sql = "SELECT SUM(product_quantity) AS total FROM cart WHERE users_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            echo $row['total'];
            $_SESSION['cart_total'] = $row['total'];
        }
        ?>
    </span>
</a> 
            <script>
                window.addEventListener('DOMContentLoaded', function() {
                    const cartTotal = document.getElementById('cart-total');
                    if (cartTotal && parseInt(cartTotal.textContent) === 0) {
                        cartTotal.style.display = 'none';
                    }
                });
            </script>
             <span class="user-login">
                    <?php
                    if(isset($_SESSION["useruid"])) {
                        //echo "<li><a href = 'profile.php'>Pofile page</a></li>";
                        echo "<li><a href = 'includes/logout.inc.php'> ". $_SESSION['useruid'] ."</a></li>";
                    }
                    else {
                        //echo "<li><a href = 'register.php'>Register</a></li>";
                        echo "<li><a href = 'login.php'>Login</a></li>";
                        
                    }
                    ?>
                </span>
                <script>
                    window.onload = function() {
                        var scrollPosition = <?php echo isset($_GET['scroll']) ? $_GET['scroll'] : '0'; ?>;
                        window.scrollTo(0, scrollPosition);
                    };
                </script>      
           
        </div>
    </nav>
</body>
