<?php include '../php/single.php'; ?>
<?php include '../php/index.php'; ?>
<?php include '../php/insert_basket.php'; ?>
<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>صفحه محصول</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    body {
      font-family: IRANSans;
      direction: rtl;
      text-align: right;
      background-color: #f3f4f6;
      color: #333;
    }

    .parent {
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 10px;
    }

    .product-image {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      border: 1px solid rgba(252, 189, 21, 1);
    }

    .product-info {
      margin-top: 20px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .btn-warning {
      margin-top: 20px;
      background-color: #ff9800;
      border-color: #ff9800;
      transition: all 0.3s;
    }

    .btn-warning:hover {
      background-color: #e68900;
      border-color: #e68900;
    }

    footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px 0;
    }

    .product-section {
      padding: 40px 0;
    }

    h1,
    h4,
    h5 {
      color: #555;
    }

    p {
      line-height: 1.8;
    }

    .product-info p {
      margin-bottom: 20px;
    }

    .title {
      font-size: 14px;
      font-family: IranSans;
      font-weight: 600;
    }

    .bg-lighter {
      background-color: rgba(250, 250, 250, 1);
      border-radius: 15px;
      padding: 1.5rem;
      font-size: 14px;
      color: #212529;
      margin-top: 10px;
      margin-bottom: 10px;
    }

    .productName {
      font-size: 1.75rem;
      font-weight: 500;
      color: #212529;
    }

    .price {
      font-size: 1.25rem;
      font-weight: 500;
      color: rgba(252, 189, 21, 1);
    }

    .bottom {
      display: flex;
      align-items: baseline;
      gap: 10px;
      width: 100%;
      justify-content: flex-end;
    }
  </style>
</head>

<body>

  <!-- Header -->
  <?php include './header.php'; ?>

  <div class="container product-section">
    <?php if ($product): ?>
      <div class="row align-items-center bg-white parent">
        <!-- نمایش اطلاعات محصول در سمت چپ -->
        <div class="col-lg-7 order-lg-2">
          <span class="productName"><?php echo $product['product_name']; ?></span>
          <p class="bg-lighter col-lg-11 rounded p-4">با توجه به تفاوت رنگ در صفحه نمایش و واقعیت، ممکن است
            رنگ محصولات تا
            ۲۰٪ متغیر باشد</p>
          <div class="product-info">
            <!-- نمایش اطلاعات محصول -->
            <div>
              <span class="title">توضیحات:</span>
              <span><?php echo $product['description']; ?></span>
            </div>

            <!-- نمایش موجودی محصول -->
            <div>
              <!-- <span class="title">موجودی:</span>
              <span><?php echo $product['stock']; ?> عدد</span> -->
            </div>

            <?php if (isset($_SESSION['signin']) && $_SESSION['signin'] === true): ?>
              <!-- بررسی موجودی کالا قبل از نمایش دکمه افزودن به سبد خرید -->
              <?php if (isset($product['stock']) && $product['stock'] > 0): ?>
                <!-- فرم برای ارسال اطلاعات محصول به سبد خرید -->
                <div class="bottom">
                  <span class="price"><?php echo $product['price']; ?> تومان</span>
                  <form method="POST" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="submit" name="Record" class="btn btn-warning" value="افزودن به سبد خرید">
                  </form>
                </div>

              <?php else: ?>
                <span style="color: red;">ناموجود</span>
              <?php endif; ?>

            <?php else: ?>
              <span>لطفاً <a href="login.php">وارد شوید</a> تا بتوانید محصول را به سبد خرید اضافه کنید.</span>
            <?php endif; ?>
          </div>
        </div>

        <!-- نمایش تصویر محصول در سمت راست -->
        <div class="col-lg-4 order-lg-1">
          <img src="<?php echo $product['image_path']; ?>" alt="تصویر محصول" class="product-image">
        </div>
      </div>
    <?php else: ?>
      <p>محصولی یافت نشد.</p>
    <?php endif; ?>
  </div>

  <!-- Footer -->
  <?php include './footer.php'; ?>

</body>

</html>