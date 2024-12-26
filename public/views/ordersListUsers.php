<?php
include '../php/db.php';

session_start();
$user_id = $_SESSION['user_id']; 

$query = "SELECT o.id AS order_id, o.total_price, o.address, o.created_at, o.status, p.product_name AS product_name
          FROM orders o
          JOIN products p ON o.product_id = p.id
          WHERE o.user_id = :user_id
          ORDER BY o.created_at DESC";

$stmt = $conn->prepare($query);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();

// Fetch all orders
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Function to convert order status to text
function getOrderStatus($status) {
    switch ($status) {
        case 0:
            return "در حال پردازش";
        case 1:
            return "ارسال";
        case 2:
            return "عدم ارسال";
        default:
            return "وضعیت نامشخص";
    }
}
?>

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست سفارشات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <style>
        body {
            font-family: 'IRANSans', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            direction: rtl;
            text-align: right;
        }

        .order-container {
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        table th {
            background-color: #f4f4f4;
            color: #555;
        }

        .table-footer {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .btn-view {
            background-color: rgb(252, 189, 21, 1);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-top: 20px;
            transition: 0.3s ease;
        }

        .btn-view:hover {
            background-color: #0d6efd;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }

        .status-color {
            color: #f39c12;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include './header.php'; ?>

    <div class="container order-container">
        <h2 class="text-center">لیست سفارشات شما</h2>

        <?php if (!empty($orders)): ?>
            <table>
                <thead>
                    <tr>
                        <th>اسم محصول</th>
                        <th>آدرس</th>
                        <th>تاریخ سفارش</th>
                        <th>جمع نهایی</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['product_name']; ?></td>
                            <td><?php echo $order['address']; ?></td>
                            <td><?php echo date('Y-m-d', strtotime($order['created_at'])); ?></td>
                            <td><?php echo number_format($order['total_price']); ?> تومان</td>
                            <td class="status-color">
                                <?php echo getOrderStatus($order['status']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">شما هیچ سفارشی ندارید.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <?php include './footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
