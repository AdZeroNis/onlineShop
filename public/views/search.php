<?php
include '../php/db.php';

$results = [];
$searchKey = '';

if (isset($_GET['search_key'])) {
    $searchKey = $_GET['search_key'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ?");
    $stmt->execute(["%$searchKey%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>نتایج جستجو</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
  <?php include './header.php'; ?>

  <div class="container my-4">
    <h2 class="mb-4">نتایج جستجو برای: "<?php echo ($searchKey); ?>"</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      <?php if (count($results) > 0): ?>
        <?php foreach ($results as $row): ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="<?php echo ($row['image_path']); ?>" class="card-img-top" alt="تصویر محصول">
              <div class="card-body">
                <h5 class="card-title"> <?php echo mb_strimwidth($row['product_name'], 0, 50, "..."); ?></h5>
                <p class="card-text">قیمت: <?php echo ($row['price']); ?> تومان</p>
                <a href="./singlePage.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" style="background: #007bff !important;">مشاهده جزئیات</a>
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

</body>

</html>
