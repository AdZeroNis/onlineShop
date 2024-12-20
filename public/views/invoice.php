<?php include '../php/basket.php'; ?>

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاکتور نهایی</title>
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

        .invoice-container {
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

        .address-field {
            margin-top: 20px;
            text-align: right;
        }

        .btn-submit {
            background-color: rgb(252, 189, 21, 1);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            margin-top: 20px;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0d6efd;
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

    <div class="container invoice-container">
        <h2 class="text-center">فاکتور نهایی</h2>

        <!-- Table to display total sum, shipping cost, and final price -->
        <table>
            <thead>
                <tr>
                    <th>جمع کل سبد خرید</th>
                    <th>هزینه ارسال</th>
                    <th>جمع نهایی</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo number_format($total_sum); ?> تومان</td>
                    <td><?php echo number_format($shipping_cost); ?> تومان</td>
                    <td><?php echo number_format($final_price); ?> تومان</td>
                </tr>
            </tbody>
        </table>

        <!-- Form for submitting all basket items together -->
        <form action="../php/insertOrder.php" method="POST" class="address-field">
            <label for="address">آدرس تحویل:</label>
            <input type="text" name="address" id="address" class="form-control" value="<?php echo ($users['address']); ?>" placeholder="آدرس خود را وارد کنید" />

            <!-- Loop through the basket items and include hidden fields for each -->
            <?php foreach ($basket_items as $item) { ?>
                <input type="hidden" name="product_id[]" value="<?php echo $item['product_id']; ?>" /> <!-- ارسال product_id -->
                <input type="hidden" name="basket_id[]" value="<?php echo $item['basket_id']; ?>" />
            <?php } ?>

            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <input type="hidden" name="total_price" value="<?php echo $final_price; ?>" />

            <!-- Submit button for the entire basket -->
            <button type="submit" name="Record" class="btn-submit">تأیید و ثبت سفارش</button>
        </form>
    </div>


    <!-- Footer -->
    <?php include './footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>