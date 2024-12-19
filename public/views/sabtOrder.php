<?php
include '../php/profile.php';

// دریافت شناسه کاربر
$user_id = $_SESSION['user_id'];

// بازیابی شناسه سبد خرید کاربر از دیتابیس
$query = "SELECT id FROM basket WHERE user_id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$basket = $stmt->fetch(PDO::FETCH_ASSOC);
$basket_id = $basket['id'];

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
        <h2 class="text-center">سفارشات </h2>

        <table>
            <thead>
                <tr>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                   <td> سفارش شما ثبت شد برای دیدن وضعیت سفارش خود به لیست سفارشات بروید</td>
                   
                </tr>
            </tbody>
        </table>
           
        </form>
    </div>

    <!-- Footer -->
    <?php include './footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>