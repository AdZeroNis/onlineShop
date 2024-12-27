<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "خطا: شناسه کاربر یافت نشد.";
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['Record'])) {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        echo "Product ID: " . $product_id;

        try {
            $query = "INSERT INTO basket (user_id, product_id, quantity) VALUES (?, ?, 1)";
            $stmt = $conn->prepare($query);
          
            $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
            $stmt->bindValue(2, $product_id, PDO::PARAM_INT);
  
            if ($stmt->execute()) {
                header("Location: basket.php");
                exit();
            } else {
                echo "خطا در افزودن به سبد خرید.";
            }

        } catch (PDOException $e) {
            echo "خطا: " . $e->getMessage();
        }
    } else {
        echo "خطا: شناسه محصول ارسال نشده است.";
    }
}
