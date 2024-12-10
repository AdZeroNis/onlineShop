<?php
session_start();
if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
  header('Location: ./login.php');
  exit;
}

include 'db.php';

// گرفتن اطلاعات محصول بر اساس نام یا شناسه از پارامتر `post`
if (isset($_GET['product'])) {
  $product_name = $_GET['product'];
  
  $sql = "SELECT id,product_name, price, size, color, description, image_path, stock FROM products WHERE product_name = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bindValue(1, $product_name);
  $stmt->execute();
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
  echo "محصول یافت نشد.";
  exit;
}
?>
