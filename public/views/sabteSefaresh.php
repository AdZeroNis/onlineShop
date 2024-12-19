<?php
include '../php/productsList.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لیست محصولات</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .titleWrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="titleWrapper">
            <h2>لیست محصولات</h2>
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

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>تصویر</th>
                    <th>نام محصول</th>
                    <th>قیمت</th>
                    <th>اندازه</th>
                    <th>رنگ</th>
                    <th>توضیحات</th>
                    <th>عملیات</th>

                </tr>
            </thead>
            <tbody>
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $row): ?>
                        <tr>
                            <td><img src="<?php echo ($row['image_path']); ?>" alt="تصویر محصول" width="80" height="80"></td>
                            <td><?php echo ($row['product_name']); ?></td>
                            <td><?php echo ($row['price']); ?> تومان</td>
                            <td><?php echo ($row['size']); ?></td>
                            <td><?php echo ($row['color']); ?></td>
                            <td><?php echo ($row['description']); ?></td>
                            <td>
                                <a href="./update.php"  class="btn btn-warning">ویرایش</a>


                                <a href="../php/deleteProduct.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">حذف</a>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">محصولی برای نمایش وجود ندارد.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- بارگذاری فایل‌های Bootstrap و جاوااسکریپت -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>