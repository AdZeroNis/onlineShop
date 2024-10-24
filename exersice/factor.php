<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>فاکتور فروش</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: "Tahoma", sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .invoice-box {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
            background: #fff;
            margin-top: 25px;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #000 !important;
            padding: 8px;
        }
        .table thead th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .invoice-header {
            margin-bottom: 20px;
        }
        .text-bold {
            font-weight: bold;
        }
        .info-table {
            width: 61%;
            margin: 20px 15%;
        }
        .info-table td {
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <!-- عنوان فاکتور فروش -->
        <div class="row invoice-header text-center mb-3">
            <div class="col">
                <h4 class="text-bold">فاکتور فروش</h4>
            </div>
        </div>

        <!-- اطلاعات فاکتور -->
        <table class="info-table table-bordered">
            <tr>
                <td class="text-start"><strong>نام:</strong></td>
                <td class="text-center">[نام مشتری]</td>
            </tr>
            <tr>
                <td class="text-start"><strong>شماره فاکتور:</strong></td>
                <td class="text-center">[شماره]</td>
            </tr>
            <tr>
                <td class="text-start"><strong>تاریخ:</strong></td>
                <td class="text-center">[تاریخ]</td>
            </tr>
        </table>

        <!-- جدول فاکتور -->
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام کالا</th>
                    <th>تعداد</th>
                    <th>قیمت کالا</th>
                    <th>قیمت کل</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function calculateTotal($items) {
                    $total = 0;
                    foreach ($items as $item) {
                        $total += $item['totalPrice'];
                    }
                    return $total;
                }

                function displayItems($items) {
                    foreach ($items as $index => $item) {
                        echo "<tr>
                                <td>" . ($index + 1) . "</td>
                                <td>{$item['name']}</td>
                                <td>{$item['quantity']}</td>
                                <td>" . number_format($item['price']) . "</td>
                                <td>" . number_format($item['totalPrice']) . "</td>
                              </tr>";
                    }
                }

                // تعریف داده‌ها
                $items = [
                    ['name' => 'محصول A', 'quantity' => 2, 'price' => 500000],
                    ['name' => 'محصول B', 'quantity' => 3, 'price' => 300000],
                    ['name' => 'محصول C', 'quantity' => 1, 'price' => 750000],
                ];

                foreach ($items as &$item) {
                    $item['totalPrice'] = $item['quantity'] * $item['price'];
                }

                // محاسبات
                $total = calculateTotal($items);
                $taxRate = 0.1; 
                $tax = $total * $taxRate;
                $finalAmount = $total + $tax;

                // نمایش ردیف‌ها
                displayItems($items);
                ?>
            </tbody>
            <tfoot>
                <tr class="table-footer">
                    <td colspan="4" class="text-center text-bold">جمع کل:</td>
                    <td><?php echo number_format($total); ?></td>
                </tr>
                <tr class="table-footer">
                    <td colspan="4" class="text-center text-bold">نرخ مالیات:</td>
                    <td><?php echo number_format($tax); ?></td>
                </tr>
                <tr class="table-footer">
                    <td colspan="4" class="text-center text-bold">مبلغ قابل پرداخت:</td>
                    <td><?php echo number_format($finalAmount); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
