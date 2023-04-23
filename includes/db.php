<?php
// create database connection
$conn = mysqli_connect("localhost", "root", "", "Magnifiscent");

// check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}




