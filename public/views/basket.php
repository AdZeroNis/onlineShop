<?php include '../php/basket.php' ?>
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
                    $item_total_price = $item['price'] * $item['quantity']; // محاسبه جمع قیمت
                    $total_sum += $item_total_price; // اضافه کردن به جمع کل
                ?>
                    <tr>
                        <td><img src="<?php echo  $item['image_path']; ?>" alt="تصویر محصول" width="100"></td>
                        <td><?php echo ($item['product_name']); ?></td>
                        <td><?php echo number_format($item['price']); ?> تومان</td>
                        <td><?php echo ($item['quantity']); ?></td>
                        <td><?php echo number_format($item_total_price); ?> تومان</td>
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
