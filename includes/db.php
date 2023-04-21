<?php
// create database connection
$conn = mysqli_connect("localhost", "root", "", "Magnifiscent");

// check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// get product data from database
$sql = "SELECT * FROM Products ";
$result = mysqli_query($conn, $sql);

// check if any rows were returned
if (mysqli_num_rows($result) > 0){
    // handle result data
}




