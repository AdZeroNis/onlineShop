<؟<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../php/db.php'; // فایل اتصال به دیتابیس

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
    // کوئری برای دریافت اطلاعات سبد خرید کاربر به همراه اطلاعات محصولات
    $query = "
        SELECT 
            products.product_name, 
            products.price, 
            basket.quantity, 
            (products.price * basket.quantity) AS total_price 
        FROM 
            basket 
        JOIN 
            products 
        ON 
            basket.product_id = products.id 
        WHERE 
            basket.user_id = :user_id
    ";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $basket_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (!$basket_items) {
        echo "سبد خرید شما خالی است.";
    }

} catch (PDOException $e) {
    echo "خطا: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            text-align: right;
        }
        .cart-container {
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: left;
        }
        .cart-title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="cart-container">
    <h2 class="cart-title">سبد خرید شما</h2>

    <?php if (!empty($basket_items)): ?>
        <table>
            <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>تعداد</th>
                    <th>جمع قیمت</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_sum = 0;
                foreach ($basket_items as $item): 
                    $total_sum += $item['total_price'];
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                        <td><?php echo number_format($item['price']); ?> تومان</td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td><?php echo number_format($item['total_price']); ?> تومان</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">جمع کل:</td>
                    <td><?php echo number_format($total_sum); ?> تومان</td>
                </tr>
            </tfoot>
        </table>
    <?php else: ?>
        <p>سبد خرید شما خالی است.</p>
    <?php endif; ?>
</div>

</body>
</html>
