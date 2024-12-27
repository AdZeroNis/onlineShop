<?php include '../php/basket.php'; ?>

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
            background-color: rgb(252, 189, 21, 1);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-top: 20px;
            transition: 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #0d6efd;
        }

        .empty-cart {
            text-align: center;
            color: #777;
            font-size: 1.2em;
            margin-top: 50px;
        }

        .btn-remove {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 6px 12px;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }

        #btn-delete {
            border: none !important;
            border-radius: 8px !important;
            padding: 9px 24px 9px 10px !important;
            margin-top: 20px !important;

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
                        <th>عکس محصول</th>
                        <th>نام محصول</th>
                        <th>قیمت</th>
                        <th>تعداد</th>
                        <th>جمع قیمت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_sum = 0;
                    foreach ($basket_items as $item):
                        $item_total_price = $item['price'] * $item['quantity']; 
                        $total_sum += $item_total_price;
                    ?>
                        <tr>
                            <td><img src="<?php echo $item['image_path']; ?>" alt="تصویر محصول" width="100"></td>
                            <td><?php echo ($item['product_name']); ?></td>
                            <td><?php echo number_format($item['price']); ?> تومان</td>
                            <td><?php echo ($item['quantity']); ?></td>

                            <td><?php echo number_format($item_total_price); ?> تومان</td>

                            <td>
                                <a href="../php/remove_from_basket.php?id=<?php echo $item['basket_id']; ?>" class="btn btn-danger" id="btn-delete">حذف</a>
                            </td>
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

                <input type="hidden" name="total_sum" value="<?php echo $total_sum; ?>" />

                <form action="./invoice.php" method="POST">
                    <input type="hidden" name="total_sum" value="<?php echo $total_sum; ?>" />
                    <button type="submit" name="Record" class="btn-checkout" style="background-color: #0d6efd;">ادامه خرید</button>
                </form>
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