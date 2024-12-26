<?php
include '../php/db.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    try {
      
        $stmt = $conn->prepare("DELETE FROM basket WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

      
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
