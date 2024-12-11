<?php
include '../php/db.php';



$query = "SELECT b.id, b.user_id, b.product_id, b.quantity, b.created_at, p.image_path
          FROM basket b
          JOIN products p ON b.product_id = p.id
          JOIN user u ON b.user_id = u.id";
$stmt = $conn->prepare($query);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
