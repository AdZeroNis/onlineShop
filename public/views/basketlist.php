<?php include '../php/basketlist.php' ?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
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

    </style>
</head>

<body>

<div class="cart-container">
    <h1>لیست سفارشات کاربران</h1>

    <table>
        <thead>
            <tr>
                <th>تصویر محصول</th>
                <td>اسم کاربر</td>
                <th>تعداد</th>
                <td>اسم محصول</td>
                <th>تاریخ سفارش</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><img src="<?php echo $order['image_path']; ?>" alt="تصویر محصول" width="100"></td>
        <td><?php echo $order['user_name']; ?></td> <!-- نمایش نام کاربر -->
        <td><?php echo ($order['quantity']); ?> عدد</td>
        <td><?php echo $order['product_name']; ?></td> <!-- نمایش نام محصول -->
        <td><?php echo $order['created_at']; ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>

    </table>
</div>

</body>
</html>
