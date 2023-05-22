<?php

include "../includes/db.php";

//getting id of the data from url
$product_id = $_GET['incrementID'];

// Query to increment the value
$result = mysqli_query($conn, "UPDATE cart SET product_quantity = product_quantity + 1 WHERE product_id = $product_id");

header("location: ../cart.php");
exit;
