<?php

function component($productname, $productprice, $productimage, $productid){
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
                        <button class='btn' type='submit' name='add' value='$productid'>Add to Cart</button>
                        <input type='hidden' name='product_id' value='$productid'/>
                    </div>   
            </div>
        </form>
    </div>";

    echo $element;
}

function cartElement($productname, $productprice, $productimage, $productid){
    $cartElement = "<form action='cart.phh' method='GET' class='cart-items'>
            <div>
                <img src=$productimage alt='image'>
            </div>
            <div class=''>
                <h5 class='title'>$productname</h5>
                <h5 class='price'>$productprice</h5>
                <h5 class='price'>asdasjdlmasjdmoasd</h5>
                <button class='btn' type='delete' name='buy'>Delete</button>
            </div>
            <div>
                <button><i class='fas fa-minus'></i></button>
                <input type='text' value='1' class='counter'>
                <button><i class='fas fa-plus'></i></button>
            </div>
        </form>";

        echo $cartElement;
}