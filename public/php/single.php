<?php
session_start();
if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
  header('Location: ./login.php');
  exit;
}

include 'db.php';

// گرفتن اطلاعات محصول بر اساس آیدی از پارامتر `id` در URL
$product = null; // مقداردهی اولیه برای جلوگیری از خطای Undefined variable

if (isset($_GET['id'])) {  // دریافت آیدی محصول از URL
  $product_id = $_GET['id'];
  
  // کوئری برای دریافت اطلاعات محصول بر اساس آیدی
  $sql = "SELECT id, product_name, price, size, color, description, image_path, stock FROM products WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(1, $product_id, PDO::PARAM_INT);
  $stmt->execute();
  
  // دریافت نتیجه کوئری
  $product = $stmt->fetch(PDO::FETCH_ASSOC);
  
  // بررسی اینکه محصول یافت شده است یا خیر
  if (!$product) {
      echo "محصول یافت نشد.";
  }
} else {
  echo "آیدی محصول ارسال نشده است.";
}
?>