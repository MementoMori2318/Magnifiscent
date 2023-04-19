<?php

function emptyInputRegister($name, $address, $email,  $pwd, $pwdrepeat ){
    $result;
    if (empty($name) || empty($address) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return  $result;
}
function invalidUid($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return  $result;
}
function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return  $result;
}
function pwdMatch($pwd, $pwdrepeat){
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return  $result;
}
function uidExists($conn, $email){
   $sql = "SELECT * FROM customer WHERE customer_name = ? OR customer_email = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register.php?error=stmtfailed");
        exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
   }
   else {
    $result = false;
    return $result;
   }

   mysqli_stmt_close($stmt);
}

function  createUser($conn, $name, $address ,$email, $pwd){
    $sql = "INSERT INTO customer (customer_name, customer_address, customer_email, customer_password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../register.php?error=stmtfailed");
         exit();
    }
 
    $hashedPwd =password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $address ,$email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
 
 }
 function emptyInputLogin($username, $pwd ){
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return  $result;
}
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd == true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();

    }
}