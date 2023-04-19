<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    
    require_once 'db.php';
    require_once 'functions.inc.php';

    if (emptyInputRegister($name, $address, $email, $pwd, $pwdrepeat ) !== false) {
        header("location: ../register.php?error=emtyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../register.php?error=passworddontmatch");
        exit();
    }
    if (uidExists($conn, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name,$address, $email, $pwd);

}
else {
    header("location: ../register.php");
    exit();
}



