<?php

    // Start session
    session_start();

    require_once('includes\db.php');
    require('includes\cart.inc.php');
  
   
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css" href="styles.css?version=51">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php require("header.php")?>
    <!-- START Product -->
    <div class="container">
        <div class="row">
           <?php
                getProduct($conn); 
              
           ?>
        </div>
    </div>
    <!--END Product -->
</body>
</html>