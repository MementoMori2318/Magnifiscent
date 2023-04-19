<?php

if (isset($_POST["submit"])) {
   
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'db.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../login.php?error=emtyinput");
        exit();
    }

    loginUser($conn, $email, $pwd);
}
else {
    header("location: ../login.php");
    exit();
}