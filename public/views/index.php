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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <style>
    .slider {
      position: relative;
      width: 80%;
      margin: 50px auto;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
      box-sizing: border-box;
    }

    .slide img {
      width: 100%;
      height: 400px;
      display: block;
    }

    .controls {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
    }

    .control {
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .control:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    .indicators {
      position: absolute;
      bottom: 15px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }

    .indicator {
      width: 10px;
      height: 10px;
      background-color: #ddd;
      border-radius: 50%;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .indicator.active {
      background-color: #333;
    }
  </style>
</head>

<body>
  <?php include './header.php'; ?>

  <div class="slider">
    <div class="slides">
      <div class="slide">
        <img src="https://gooshishop.com/images/thumbs/n/Entity/0076462_1920x440-20.jpeg.webp" alt="Mobile Accessories">
      </div>
      <div class="slide">
        <img src="https://gooshishop.com/images/thumbs/n/Entity/0076441_1920x440-18.jpeg.webp" alt="Laptops">
      </div>
      <div class="slide">
        <img src="https://gooshishop.com/images/thumbs/n/Entity/0076333_1920x440-17.jpeg.webp" alt="Headphones">
      </div>
    </div>
    <div class="controls">
      <button class="control prev">&#10094;</button>
      <button class="control next">&#10095;</button>
    </div>
    <div class="indicators">
      <div class="indicator active"></div>
      <div class="indicator"></div>
      <div class="indicator"></div>
    </div>
  </div>

  <div class="container my-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      <?php if (count($products) > 0): ?>
        <?php foreach ($products as $row): ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="<?php echo ($row['image_path']); ?>" class="card-img-top" style="height: 239px !important; " alt="تصویر محصول">
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

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
let slideIndex = 0;  // شروع از اولین اسلاید
showSlides(slideIndex);  // نمایش اسلاید اولیه

// دکمه‌های قبلی و بعدی
function moveSlide(n) {
    showSlides(slideIndex += n);
}

// نمایش اسلاید
function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");  // استفاده از کلاس صحیح برای اسلایدها
    if (n >= slides.length) {
        slideIndex = 0;  // اگر به آخر رسیدیم، به اول برمی‌گردد
    }
    if (n < 0) {
        slideIndex = slides.length - 1;  // اگر به ابتدا رسیدیم، به آخر برمی‌گردد
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  // همه اسلایدها را مخفی می‌کنیم
    }
    slides[slideIndex].style.display = "block";  // اسلاید فعلی را نمایش می‌دهیم
}

// تابع اسلاید خودکار
function autoSlides() {
    let slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  // همه اسلایدها را مخفی می‌کنیم
    }
    slideIndex++;
    if (slideIndex >= slides.length) {
        slideIndex = 0;  // اگر به آخر رسیدیم، به اول برمی‌گردد
    }
    slides[slideIndex].style.display = "block";  // اسلاید فعلی را نمایش می‌دهیم
    setTimeout(autoSlides, 5000);  // هر 5 ثانیه اسلاید بعدی را نمایش می‌دهیم
}

autoSlides();  // اجرای تابع اسلاید خودکار

  </script>
</body>

</html>