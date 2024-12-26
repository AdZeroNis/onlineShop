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
              <img src="<?php echo ($row['image_path']); ?>" class="card-img-top" alt="تصویر محصول">
              <div class="card-body">
                <h5 class="card-title"><?php echo ($row['product_name']); ?></h5>
                <p class="card-text">قیمت: <?php echo ($row['price']); ?> تومان</p>
                <a href="./singlePage.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"  style="background: #007bff !important;">مشاهده جزئیات</a>
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
    const slides = document.querySelector('.slides');
    const slide = document.querySelectorAll('.slide');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const indicators = document.querySelectorAll('.indicator');

    let currentIndex = 0;

    function updateSlider() {
      slides.style.transform = `translateX(-${currentIndex * 100}%)`; // حرکت اسلایدها
      indicators.forEach((indicator, index) => {
        indicator.classList.toggle('active', index === currentIndex); // تغییر indicator فعال
      });
    }

    // حرکت به اسلاید قبلی
    prev.addEventListener('click', () => {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : slide.length - 1;
      updateSlider();
    });

    // حرکت به اسلاید بعدی
    next.addEventListener('click', () => {
      currentIndex = (currentIndex < slide.length - 1) ? currentIndex + 1 : 0;
      updateSlider();
    });

    // تغییر اسلاید با کلیک روی indicator
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        currentIndex = index;
        updateSlider();
      });
    });
  </script>
</body>

</html>