<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../php/db.php'; 

// Check if the user is logged in
if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
    header("Location: login.php");
    exit();
}

// Check if the user_id is set in session
if (!isset($_SESSION['user_id'])) {
    echo "خطا: شناسه کاربر یافت نشد.";
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Retrieve user address
    $query_user = "SELECT address FROM user WHERE id = ?";
    $stmt_user = $conn->prepare($query_user);
    $stmt_user->bindValue(1, $user_id, PDO::PARAM_INT);
    $stmt_user->execute();
    $users = $stmt_user->fetch(PDO::FETCH_ASSOC);

    // Retrieve basket items
    $query_basket = "SELECT b.id AS basket_id, b.quantity, p.product_name, p.price, p.image_path, p.id AS product_id
                     FROM basket b
                     JOIN products p ON b.product_id = p.id
                     WHERE b.user_id = ?";
    
    $stmt_basket = $conn->prepare($query_basket);
    $stmt_basket->bindValue(1, $user_id, PDO::PARAM_INT);
    $stmt_basket->execute();
    $basket_items = $stmt_basket->fetchAll(PDO::FETCH_ASSOC);

    // Calculate total sum
    $total_sum = 0;
    foreach ($basket_items as $item) {
        $total_sum += $item['price'] * $item['quantity'];
    }

    // Shipping cost
    $shipping_cost = 50000;
    $final_price = $total_sum + $shipping_cost;

} catch (PDOException $e) {
    echo "خطا: " . $e->getMessage();
}
?>
