<?php




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
