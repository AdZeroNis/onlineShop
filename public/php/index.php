<?php
include '../php/db.php';

$sql = "SELECT * FROM products";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
