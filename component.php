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

