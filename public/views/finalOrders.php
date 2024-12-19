<?php
include '../php/db.php';


// بازیابی تمام سفارشات از دیتابیس
$query = "SELECT o.id AS order_id, o.total_price, o.address, o.status, o.user_id, p.product_name, p.image_path, u.username AS user_name
          FROM orders o
          JOIN products p ON o.product_id = p.id
          JOIN user u ON o.user_id = u.id";  // فرض می‌کنیم که جدول users در دیتابیس وجود دارد
$stmt = $conn->prepare($query);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست سفارشات کاربران</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
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
        .cart-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .product-image {
            width: 50px;  /* عرض تصویر */
            height: auto;
        }
    </style>
</head>

<body>

<div class="cart-container">
    <h1 class="cart-title">لیست سفارشات کاربران</h1>

    <table>
        <thead>
            <tr>
                <th>آیدی سفارش</th>
                <th>عکس محصول</th>
                <th>کاربر</th>
                <th>جمع نهایی</th>
                <th>آدرس</th>
                <th>وضعیت</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td>
                        <img src="<?php echo $order['image_path']; ?>" alt="تصویر محصول" class="product-image">
                    </td>
                    <td><?php echo $order['user_name']; ?></td>
                    <td><?php echo number_format($order['total_price']); ?> تومان</td>
                    <td><?php echo $order['address']; ?></td>
                    <td>
                        <!-- فرم انتخاب وضعیت -->
                        <form action="../php/updateStatus.php" method="POST">
                            <select name="status" onchange="this.form.submit()">
                                <option value="0" <?php echo ($order['status'] == 0) ? 'selected' : ''; ?>>در حال پردازش</option>
                                <option value="1" <?php echo ($order['status'] == 1) ? 'selected' : ''; ?>>ارسال</option>
                                <option value="2" <?php echo ($order['status'] == 2) ? 'selected' : ''; ?>>عدم ارسال</option>
                            </select>
                            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
