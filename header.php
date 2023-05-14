
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
        <div href="cart.php" class="cart">
            <div class="cart-counter">
            <div class="icon">
                <i class='fas fa-shopping-cart'></i> 
                </div>
                
                <span id="cart-total"><?php echo isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0; ?></span>
            </div>
                
            <div class='dropdown'>
                    <?php
                        if(isset($_SESSION["useruid"])) {  
                            echo "
                            <div class='icon'>
                            <i class='fa fa-user'></i>
                            </div>
                            ";
                        }
                        else {                    
                            echo "
                            <div class='icon'>
                            <i class='fa fa-user'></i>
                            </div>";
                        }
                    ?>
                    <div class="dropdown-content">
                        <?php
                            if(isset($_SESSION["useruid"])) {
                                echo "<a href = 'includes/logout.inc.php'> ". $_SESSION['useruid'] ."</a>";
                                echo "<a href = 'includes/logout.inc.php'>Logout</a>";
                            }
                            else {
                                echo "<a href='login.php'>Login</a>";
                                echo "<a href='register.php'>Register</a>";
                            }
                        ?>
                    </div>
                </div>

        </div>
            <script>
                window.addEventListener('DOMContentLoaded', function() {
                    const cartTotal = document.getElementById('cart-total');
                    if (cartTotal && parseInt(cartTotal.textContent) === 0) {
                        cartTotal.style.display = 'none';
                    }
                });
                document.addEventListener("click", function(e) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (e.target !== openDropdown && !openDropdown.contains(e.target)) {
                    openDropdown.style.display = "none";
                    }
                }
                });

            </script>
            
                    
               
             
           
        </div>
    </nav>
</body>
