<?php

function component($productname, $productprice, $productimage){
    $element = "<div class='products'>
        <form>
            <div class='card'>
                <div>
                    <img src='$productimage' alt='Image1' class='img'>
                </div>
                <div class='card-body'>
                    <h5 class='title'>$productname</h5>
                    <h6>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='far fa-star'></i>
                    </h6>
                    <p>
                        Sample Descriptions for the Product
                    </p>
                    <h5>
                        <span class='price'>$productprice</span>
                    </h5>
                    <button class='btn' type='submit' name='add'>Add to cart<i class='fas fa-shopping-cart'></i></button>
                </div>
            </div>
        </form>
    </div>";

    echo $element;
}
