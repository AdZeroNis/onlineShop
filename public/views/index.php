<?php
session_start();
if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {

  header('Location: ./login.php');
  exit;
}
?>
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
  <style>
    /* Style for the dropdown container */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Hidden dropdown menu initially */
    .dropdown-menu {
      display: none;
      position: absolute;
      background-color: #f8f9fa;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      z-index: 1;
      padding: 10px 0;
    }

    /* Display dropdown menu on hover */
    .dropdown:hover .dropdown-menu {
      display: block;
    }

    /* Dropdown items style */
    .dropdown-item {
      color: #343a40;
      padding: 8px 16px;
      text-decoration: none;
      display: block;
    }

    /* Style for dropdown items when hovered */
    .dropdown-item:hover {
      background-color: #e9ecef;
      color: #495057;
    }
  </style>
</head>

<body>
<?php include './header.php'; ?>
  <?php
  if (count($products) > 0): 
      ?>
        <?php foreach ($products as $row): ?>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="<?php echo ($row['image_path']); ?>" class="card-img-top" alt="تصویر محصول">
              <div class="card-body">
                <h5 class="card-title"><?php echo ($row['product_name']); ?></h5>
                <p class="card-text">
                  قیمت: <?php echo ($row['price']); ?> تومان<br>
                  <a href="./singlePage.php?product=<?php echo ($row['product_name']); ?>" style="color: rgb(252, 189, 21);">مشاهده جزئیات</a>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>محصولی برای نمایش وجود ندارد.</p>
      <?php endif; ?>
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