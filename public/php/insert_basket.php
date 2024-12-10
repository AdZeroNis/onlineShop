<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';


if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
    header("Location: login.php");
    exit();
}


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
         
            $query = "SELECT * FROM basket WHERE product_id = :product_id AND user_id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
             
                $query = "UPDATE basket SET quantity = quantity + 1 WHERE product_id = :product_id AND user_id = :user_id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            } else {
            
                $query = "INSERT INTO basket (user_id, product_id, quantity) VALUES (:user_id, :product_id, 1)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            }

  
            if ($stmt->execute()) {
    
                header("Location: basket.php");
                exit();
            } else {
                // خطا در کوئری
                echo "خطا در افزودن به سبد خرید.";
            }

        } catch (PDOException $e) {
            // مدیریت خطاها
            echo "خطا: " . $e->getMessage();
        }
    } else {
        echo "خطا: شناسه محصول ارسال نشده است.";
    }
}

?>
