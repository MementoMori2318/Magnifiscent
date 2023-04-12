<?php

function component($productname, $productprice, $productimage, $productid){
    $element = "<div class='products'>
        <form>
            <div class='card'>
                <div>
                    <img src='$productimage' alt='Image1' class='img'>
                </div>
                <div class='card-body'>
                    <h5 class='title'>$productname</h5>
                    <h5>
                        <span class='price'>₱$productprice.00</span>
                    </h5>
                    <button class='btn' type='submit' name='add'>Add to Cart  <i class='fas fa-shopping-cart'></i></button>
                    <input type='hidden' name='product_id' value='$productid'/>
                </div>
            </div>
        </form>
    </div>";

    echo $element;
}
