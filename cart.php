<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Cart</title>
</head>
<body>
    <?php require("header.php")?>
    <div class="container">
        <div class="cart-item-container">
            <h1>Your cart</h1>
            <form action="cart.phh" method="get" class="cart-items">
                <div>
                    <img src="image/1.png" alt="image">
                </div>
                <div class="">
                    <h5 class="title">Product</h5>
                    <h5 class="price">12312</h5>
                    <button class='btn' type='submit' name='buy'>Buy Now</button>
                                <button class='btn' type='submit' name='add' value='$productid'>Add to Cart</button>
                                <input type='hidden' name='product_id' value='$productid'/>
                </div>
            </form>
        </div>
        <div class="total-item-container">
            
        </div>
    </div>
</body>
</html>

