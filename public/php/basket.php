<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../php/db.php'; 
// چک کردن ورود کاربر
if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    echo "خطا: شناسه کاربر یافت نشد.";
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Corrected SQL Query with proper column separator
    $query = "SELECT b.id, b.quantity, p.product_name, p.price, p.image_path
    FROM basket b
    JOIN products p ON b.product_id = p.id
    WHERE b.user_id = :user_id";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $basket_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    


} catch (PDOException $e) {
    echo "خطا: " . $e->getMessage();
}
?>
