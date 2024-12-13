<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // دریافت جمع قیمت از سبد خرید
    $total_sum = isset($_POST['total_sum']) ? intval($_POST['total_sum']) : 0;
    $shipping_cost = 50000; // هزینه ارسال
    $final_price = $total_sum + $shipping_cost; // محاسبه جمع نهایی
}
?>

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
    </style>
</head>

<body>
    <!-- Header -->
    <?php include './header.php'; ?>

    <div class="container invoice-container">
        <h2 class="text-center">فاکتور نهایی</h2>

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

        <form action="confirm_order.php" method="POST" class="address-field">
            <label for="address">آدرس تحویل:</label>
            <input type="text" name="address" id="address" class="form-control" required placeholder="آدرس خود را وارد کنید" />

            <input type="hidden" name="final_price" value="<?php echo $final_price; ?>" />
            <button type="submit" class="btn-submit">تأیید و ثبت سفارش</button>
        </form>
    </div>

    <!-- Footer -->
    <?php include './footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
