<?php include '../php/single.php' ?>
<?php include '../php/index.php' ?>
<!DOCTYPE html>
<html lang="fa">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>صفحه محصول</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    body {
      font-family: 'IRANSans', sans-serif;
      direction: rtl;
      text-align: right;
    }

    .product-image {
      max-width: 100%;
      height: auto;
    }

    .product-info {
      margin-top: 20px;
    }

    .btn-warning {
      margin-top: 20px;
      margin-left: 470px;
    }

    footer {
      background-color: #f8f9fa;
      padding: 20px 0;
    }

    .footer .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .footer .footer-widget {
      margin-bottom: 15px;
    }
  </style>
</head>

<body>

  <!-- Header -->
  <?php include './header.php'; ?>

  <div class="container">
    <?php if ($product): ?>
      <div class="row">
        <!-- نمایش اطلاعات محصول در سمت چپ -->
        <div class="col-lg-6 order-lg-2 order-1">
          <div class="product-info">
            <!-- نمایش اطلاعات محصول -->
            <h1><?php echo $product['product_name']; ?></h1>
            <p><?php echo $product['description']; ?></p>
            <h4>قیمت: <?php echo $product['price']; ?> تومان</h4>

            <?php if (isset($_SESSION['signin']) && $_SESSION['signin'] === true): ?>
            <a href=" " class="btn btn-warning">افزودن به سبد خرید</a>
            <?php else: ?>
                <p>لطفاً <a href="login.php">وارد شوید</a> تا بتوانید محصول را به سبد خرید اضافه کنید.</p>
                <?php endif; ?>
          </div>
        </div>

        <!-- نمایش تصویر محصول در سمت راست -->
        <div class="col-lg-6 order-lg-1 order-2">
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
