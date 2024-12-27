<?php
include '../php/db.php';

session_start();
$user_id = $_SESSION['user_id'];
$query = "SELECT o.id AS order_id, o.total_price, o.address, o.created_at, o.status, p.product_name, p.image_path, u.username AS user_name
          FROM orders o
          JOIN products p ON product_id = p.id
          JOIN user u ON o.user_id = u.id
          WHERE o.user_id = :user_id
          ORDER BY o.created_at DESC";

$stmt = $conn->prepare($query);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();

// Fetch all orders
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

        table,
        th,
        td {
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
            width: 50px;
            /* عرض تصویر */
            height: auto;
        }

        .titleWrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
</head>

<body>

    <div>
        <div class="titleWrapper">
            <h2>لیست سفارشات</h2>
            <svg width="260" height="2" viewBox="0 0 260 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M259.5 1H0" stroke="url(#paint0_linear)" />
                <defs>
                    <linearGradient id="paint0_linear" x1="260" y1="1.99734" x2="0" y2="1.99734" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3C8023" />
                        <stop offset="1" stop-color="#3C8023" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
        </div>

        <div class="cart-container">

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
    </div>

</body>

</html>