<?php
include '../php/db.php'; // اتصال به دیتابیس

// چک کردن ورود کاربر
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
    header("Location: login.php");
    exit();
}

// بررسی وجود آیدی محصول برای حذف
if (isset($_GET['id'])) {
    $id = $_GET['id']; // گرفتن آیدی محصول از URL

    try {
        // حذف محصول از سبد خرید
        $stmt = $conn->prepare("DELETE FROM basket WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // بررسی موفقیت‌آمیز بودن حذف
        if ($stmt->rowCount() > 0) {
            header('location: ../views/basket.php');
        } else {
            echo "حذف محصول ناموفق بود.";
        }
    } catch (PDOException $e) {
        echo "خطا: " . $e->getMessage();
    }
} else {
    echo "محصول یافت نشد.";
}
?>
