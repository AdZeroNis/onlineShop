<?php

include './db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $update_query = "UPDATE orders SET status = :status WHERE id = :order_id";
    $stmt = $conn->prepare($update_query);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);


    if ($stmt->execute()) {
        header('location: ../views/mainPage.php');
    } else {
        echo "خطا در بروزرسانی وضعیت سفارش!";
    }
}
?>