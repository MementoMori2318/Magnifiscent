<?php
function getData($conn, $limit = null){
        $sql = "SELECT * FROM Products";
        if($limit){
            $sql .= " LIMIT " . $limit;
        }
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
function getProduct($conn){
    $result = getData($conn, 5);
    while($row = mysqli_fetch_assoc($result)){
      echo  "<div class='products'>
        <form method='POST'>
            <div class='card'>
                <div>
                    <img src='" . $row['product_image'] . "' alt='Image1' class='img'>
                </div>
                <div class='card-body'>
                    <h5 class='title'>" . $row['product_name'] . "</h5>
                    <h5 class='price'>" . $row['product_price'] . ".00</h5>
                </div>
                    <div class='btn-container'>
                        <button class='btn' type='submit' name='buy'>Buy Now</button>
                        <form action='" . addToCart($conn) . "' method='POST'>
                        <button class='btn' type='submit' name='add_to_cart' value='" . $row['id'] . "'>Add to Cart</button>
                        <input type='hidden' name='product_id' value='" . $row['id'] . "'/>
                        </form>
                    </div>   
            </div>
        </form>
    </div>";

    }
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
