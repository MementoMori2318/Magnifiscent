<?php

function component($productname, $productprice, $productimage, $productid, $conn){
    $element = "<div class='products'>
        <form method='POST'>
            <div class='card'>
                <div>
                    <img src='$productimage' alt='Image1' class='img'>
                </div>
                <div class='card-body'>
                    <h5 class='title'>$productname</h5>
                    <h5 class='price'>₱$productprice.00</h5>
                </div>
                    <div class='btn-container'>
                        <button class='btn' type='submit' name='buy'>Buy Now</button>
                        <form action='".addToCart($conn)."' method='POST'>
                        <button class='btn' type='submit' name='add' value='$productid'>Add to Cart</button>
                        <input type='hidden' name='product_id' value='$productid'/>
                        </form>
                    </div>   
            </div>
        </form>
    </div>";

    echo $element;
}


function cartElement($productname, $productprice, $productimage, $productid,) {
    $cartElement = "<form action='cart.php?action=delete&id=$productid' method='POST' class='cart-items'>
            <div>
                <img src=$productimage alt='image'>
            </div>
            <div class='product-info'>
                <h5 class='title'>$productname</h5>
                <h5 class='price'>₱$productprice</h5>
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

    echo $cartElement;
}
