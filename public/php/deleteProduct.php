<?php
include './db.php';


$id = $_GET['id'];


$deleteOrderItems = $conn->prepare("DELETE FROM order_items WHERE product_id = ?");
$deleteOrderItems->bindValue(1, $id);
$deleteOrderItems->execute();


$deleteProduct = $conn->prepare("DELETE FROM products WHERE id = ?");
$deleteProduct->bindValue(1, $id);
$deleteProduct->execute();


header('Location: ../views/mainPage.php');
