<?php
include '../php/profile.php';
$user_id = $_SESSION['user_id'];

$query = "SELECT o.id, o.total_price, o.address, o.crearte_at, o.status, p.product_name, p.price, p.image_path 
          FROM orders o
          JOIN products p ON o.product_id = p.id
          WHERE o.user_id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        table th,
        table td {
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

        .product-image {
            width: 50px;
            height: auto;
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
                        <th>عکس محصول</th>
                        <th>نام محصول</th>
                        <th>قیمت</th>
                        <th>آدرس</th>
                        <th>تاریخ سفارش</th>
                        <th>جمع نهایی</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>
                                <img src="<?php echo $order['image_path']; ?>" alt="تصویر محصول" class="product-image">
                            </td>
                            <td><?php echo $order['product_name']; ?></td>
                            <td><?php echo number_format($order['price']); ?> تومان</td>
                            <td><?php echo $order['address']; ?></td>
                            <td><?php echo date('Y-m-d', strtotime($order['crearte_at'])); ?></td>
                            <td><?php echo number_format($order['total_price'] + $order['price']); ?> تومان</td>
                            <td class="status-color">
                                <?php 
                                    if ($order['status'] == 0) {
                                        echo "در حال پردازش";
                                    } elseif ($order['status'] == 1) {
                                        echo "ارسال";
                                    } elseif ($order['status'] == 2) {
                                        echo "عدم ارسال";
                                    }
                                ?>
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
