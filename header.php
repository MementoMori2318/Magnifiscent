
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
                
                <a href="cart.php" class="cart"><i class='fas fa-shopping-cart'></i>
                
                <?php
                   if (isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    if ($count > 0) {
                        echo "<span class='badge' id='cart_count'>$count</span>";
                    }
                } 
                if(isset($_SESSION["useruid"])) {
                    //echo "<li><a href = 'profile.php'>Pofile page</a></li>";
                    echo "<li><a href = 'includes/logout.inc.php'>Log out</a></li>";
                }
                else {
                    //echo "<li><a href = 'register.php'>Register</a></li>";
                    echo "<li><a href = 'login.php'>Login</a></li>";
                    
                }
                ?>
                </a>
            
           
        </div>
    </nav>
</body>
