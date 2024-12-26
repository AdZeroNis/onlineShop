<?php
include '../php/index.php';
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
  <?php include './header.php'; ?>

    <div class="container my-4">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <?php
        if (count($products) > 0):
          foreach ($products as $row): ?>
            <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="<?php echo ($row['image_path']); ?>" class="card-img-top" alt="تصویر محصول">
                <div class="card-body">
                  <h5 class="card-title"><?php echo ($row['product_name']); ?></h5>
                  <p class="card-text">
                    قیمت: <?php echo ($row['price']); ?> تومان
                  </p>
                  <a href="./singlePage.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">مشاهده جزئیات</a>

                </div>
              </div>
            </div>
          <?php
          endforeach;
        else: ?>
          <p>محصولی برای نمایش وجود ندارد.</p>
        <?php
        endif; ?>
      </div>
    </div>
  </div>
  <?php include './footer.php'; ?>


  <!-- Bootstrap Bundle with Popper -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>