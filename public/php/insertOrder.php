<?php

include '../php/db.php';

session_start();
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

        $query = "INSERT INTO order_items (order_id, product_id, basket_id) VALUES (:order_id, :product_id, :basket_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':basket_id', $basket_id);
        $stmt->execute();

        // $delete_query = "DELETE FROM basket WHERE user_id  = :user_id";
        // $stmt_delete = $conn->prepare($delete_query);
        // $stmt_delete->bindParam(':user_id', $user_id);
        // $stmt_delete->execute();
    }

    header('location: ../views/ordersListUsers.php');
    exit;
} else {
    echo "Error: Unable to place the order.";
}
