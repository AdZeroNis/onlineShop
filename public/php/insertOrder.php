<?php

include '../php/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;
}
$user_id = $_SESSION['user_id'];

$address = $_POST['address'];
$total_price = $_POST['total_price'];
$order_date = date('Y-m-d H:i:s');

$query = "INSERT INTO orders (user_id, address, total_price, created_at) 
          VALUES (:user_id, :address, :total_price, :created_at)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':total_price', $total_price);
$stmt->bindParam(':created_at', $order_date);

if ($stmt->execute()) {
    $order_id = $conn->lastInsertId();

    foreach ($_POST['product_id'] as $index => $product_id) {
        $basket_id = $_POST['basket_id'][$index]; 

    
        $query = "INSERT INTO order_items (order_id, product_id) VALUES (:order_id, :product_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
    
   
        $delete_query = "DELETE FROM basket WHERE id = :basket_id AND user_id = :user_id";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bindParam(':basket_id', $basket_id);
        $delete_stmt->bindParam(':user_id', $user_id);
        $delete_stmt->execute();
    }

   
    header('location: ../views/ordersListUsers.php');
    exit;
} else {
    echo "Error: Unable to place the order.";
}
?>
