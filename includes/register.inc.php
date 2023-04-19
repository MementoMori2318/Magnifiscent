<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    
    require_once 'db.php';
    require_once 'functions.inc.php';

    if (emptyInputRegister($name, $email, $address, $username, $pwd, $pwdrepeat ) !== false) {
        header("location: ../register.php?error=emtyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../register.php?error=invaliduid");
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
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $address, $username, $pwd);

}
else {
    header("location: ../register.php");
    exit();
}



