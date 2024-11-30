<?php

include '../php/db.php';


$sql = "SELECT product_name, price, size, color, description, image_path FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
?>
