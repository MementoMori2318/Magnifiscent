<?php

include "../source/database.php";

//getting id of the data from url
$id = $_GET['incrementID'];

// Query to increment the value
$result = mysqli_query($connection, "UPDATE inventory SET stocks = stocks + 1 WHERE itemID =$id");

header("location: ../dashboard.php");
exit;
