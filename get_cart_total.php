<?php
session_start();
require_once('includes\db.php');

if(isset($_SESSION['userid'])){
    $user_id = $_SESSION['userid'];
    
    $sql = "SELECT cart_total FROM customer WHERE usersid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    $cart_total = $row['cart_total'];
    echo $cart_total;
}
?>
