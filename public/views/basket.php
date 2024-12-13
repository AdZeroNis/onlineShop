<?php include '../php/basket.php' ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
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

        .cart-container {
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

        table tr:last-child td {
            border-bottom: none;
        }

        .table-footer {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .btn-checkout {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-top: 20px;
            transition: 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #218838;
        }

        .empty-cart {
            text-align: center;
            color: #777;
            font-size: 1.2em;
            margin-top: 50px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }

    </style>
</head>

<body>
    <!-- Header -->
    <?php include './header.php'; ?>

    <div class="container cart-container">
        <h2 class="text-center">سبد خرید شما</h2>

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
            <div class="text-center">
                <button class="btn-checkout">ادامه خرید</button>
            </div>
        <?php else: ?>
            <p class="empty-cart">سبد خرید شما خالی است.</p>
        <?php endif; ?>
    </div>
    <!-- Footer -->
    <?php include './footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>