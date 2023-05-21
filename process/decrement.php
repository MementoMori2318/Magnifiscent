<?php

include "../source/database.php";

//getting id of the data from url
$id = $_GET['decrementID'];

// Query to decrement the value
$result = mysqli_query($connection, "UPDATE inventory SET stocks = stocks - 1 WHERE itemID =$id");

header("location: ../dashboard.php");
exit;
