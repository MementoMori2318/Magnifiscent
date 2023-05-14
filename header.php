
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
                <div class="icon">
                <i class='fas fa-shopping-cart'></i> 
                </div>
                
                <span id="cart-total"><?php echo isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0; ?></span>
                <?php
                    if(isset($_SESSION["useruid"])) {
                        //echo "<li><a href = 'profile.php'>Pofile page</a></li>";
                       
                        
                        echo "
                        <div class='icon'>
                        <i class='fa fa-user'></i>
                        </div>
                        <a href = 'includes/logout.inc.php'> ". $_SESSION['useruid'] ."</a>";
                    }
                    else {
                        //echo "<li><a href = 'register.php'>Register</a></li>";
                        echo "
                        <div class='icon'>
                        <i class='fa fa-user' href = 'login.php'></i>
                        </div>";
                        
                    }
                    ?>
        </a>
            <script>
                window.addEventListener('DOMContentLoaded', function() {
                    const cartTotal = document.getElementById('cart-total');
                    if (cartTotal && parseInt(cartTotal.textContent) === 0) {
                        cartTotal.style.display = 'none';
                    }
                });
            </script>
            
                    
               
             
           
        </div>
    </nav>
</body>
