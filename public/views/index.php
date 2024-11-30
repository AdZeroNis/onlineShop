<?php
session_start();
if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {

  header('Location: ./login.php');
  exit;
}
?>
<?php
// اطلاعات اتصال به دیتابیس
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ibolak";

// اتصال به دیتابیس
$conn = new mysqli($host, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
  die("خطا در اتصال به دیتابیس: " . $conn->connect_error);
}

// بازیابی محصولات
$sql = "SELECT product_name, price, size, color, description, image_path FROM products";
$result = $conn->query($sql);
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
  <a
    class="d-flex"
    style="margin-top: 0 !important"
    href="https://ibolak.com/link/redirect/d223d"
    target="_blank">
    <picture class="w-100">
      <img
        src="https://ibolak.com/storage/image/2024/8/1723454409-8xNmPrzWuTw3diVt.gif"
        style="object-fit: cover; height: 60px"
        class="w-100"
        alt="بنر بالای هدر" />
    </picture>
  </a>

  <div class="container mt-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <div class="d-flex align-items-center">
        <!-- Basket button -->
        <a href="https://ibolak.com/basket" class="btn btn-outline-secondary btn-with-icon fs-7">
          <img src="https://ibolak.com/assets/icons/basket.svg" alt="Basket icon" />
          <span>سبد خرید</span>
          <span class="btn-badge bg-light" id="basket-count-badge">0</span>
        </a>

        <!-- User account -->
        <div class="dropdown">
          <?php if (isset($_SESSION['signin']) && $_SESSION['signin'] === true) { ?>

            <?php if ($_SESSION['role'] == 1) { ?>
              <!-- If the user is an admin, show dropdown with hover effect -->
              <a href="#" class="btn btn-primary btn-with-icon me-2 ps-4 fs-7 dropdown-toggle" id="userDropdown">
                <img src="https://ibolak.com/assets/icons/user.svg" alt="User icon" />
                <span><?php echo $_SESSION['username']; ?></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="./mainPage.php">پنل ادمین</a>
              </div>

            <?php } else { ?>
              <!-- If the user is not an admin, just show the account link without dropdown -->
              <a href="#" class="btn btn-primary btn-with-icon me-2 ps-4 fs-7">
                <img src="https://ibolak.com/assets/icons/user.svg" alt="User icon" />
                <span><?php echo $_SESSION['username']; ?></span>
              </a>
            <?php } ?>

          <?php } else { ?>
            <!-- If the user is not signed in, show the login link -->
            <a href="./login.php" class="btn btn-primary btn-with-icon me-2 ps-4 fs-7">
              <img src="https://ibolak.com/assets/icons/user.svg" alt="User icon" />
              <span>حساب کاربری</span>
            </a>
          <?php } ?>
        </div>





        <form
          method="get"
          action="https://ibolak.com/products"
          class="search-wrapper">
          <span class="search-wrapper-icon">
            <img
              src="https://ibolak.com/assets/icons/search.svg"
              alt="Search Icon" />
          </span>
          <input
            name="search_key"
            autocomplete="off"
            maxlength="100"
            type="text"
            data-url="https://ibolak.com/products/search"
            placeholder="جستجو در آی&zwnj;بولک"
            class="form-control" />
        </form>
      </div>
      <a href="/" title="">
        <img
          src="https://ibolak.com/assets/images/ibolak-logo.svg"
          height="50"
          alt="آی&zwnj;بولک" />
      </a>
    </div>
  </div>

  <div class="container">
    <h3 class="mt-4">محصولات اضافه‌شده</h3>
    <div class="row">
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="<?php echo htmlspecialchars($row['image_path']); ?>" class="card-img-top" alt="تصویر محصول">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                <p class="card-text">
                  قیمت: <?php echo htmlspecialchars($row['price']); ?> تومان<br>
                  اندازه: <?php echo htmlspecialchars($row['size']); ?><br>
                  رنگ: <?php echo htmlspecialchars($row['color']); ?><br>
                  توضیحات: <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>محصولی برای نمایش وجود ندارد.</p>
      <?php endif; ?>
    </div>

  </div>

  <footer>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="row">
              <div class="col-lg-4">
                <div class="footer-widget" data-collapsible="">
                  <div data-collapsible-header="">
                    <strong>دسترسی سریع</strong>
                    <!-- <img
                        src="https://ibolak.com/assets/icons/arrow-left-simple.svg"
                        alt="Arrow left icon"
                        class="mobile-only"
                      /> -->
                  </div>

                  <ul data-collapsible-body="">
                    <li>
                      <a
                        href="https://ibolak.com/"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        صفحه اصلی
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/page/customer-support"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        پیگیری شکایات
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/page/reference-and-replacement-conditions"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        شرایط مرجوعی
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/contact"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        تماس با&zwnj; ما
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/page/about"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        درباره&zwnj;ما
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="footer-widget" data-collapsible="">
                  <ul data-collapsible-body="">
                    <li>
                      <a
                        href="https://ibolak.com/faq"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        سوالات متداول
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/page/rules"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        قوانین
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/shop/categories/ker1b/man"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        مردانه
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/shop/categories/jbqkb/لباس-زنانه"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        زنانه
                      </a>
                    </li>
                    <li>
                      <a
                        href="https://ibolak.com/shop/categories/pdv6b/kids"
                        title=""
                        target="_self"
                        class="dots-vertical">
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        <span class="dots-vertical-dots"></span>
                        کودکانه
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="footer-widget">
              <strong>فروشگاه اینترنتی پوشاک آی&zwnj;بولک</strong>
              <p>
                <b>آدرس فروشگاه:</b>
                گرگان، بلوار ناهارخوران، بالاتر از عدالت ۵۶، نرسیده به میدان
                گلشهر، فروشگاه آی&zwnj;بولک
              </p>
              <div class="row">
                <div class="col-12">
                  <p>
                    <b>آدرس ایمیل: </b>
                    <a
                      href="mailto:info@ibolak.com"
                      title="ارسال ایمیل به آی&zwnj;بولک"
                      target="_self">info@ibolak.com</a>
                  </p>
                  <p>
                    <b>شماره&zwnj;های تماس: </b>
                    <a dir="ltr" href="tel:01732534106-9" target="_self">01732534106-9</a>
                  </p>
                </div>
                <div class="col-12 pt-2">
                  <a
                    referrerpolicy="origin"
                    target="_blank"
                    href="https://trustseal.enamad.ir/?id=142490&amp;Code=Zjn4ngVF9uVoACxtfycY"><img
                      referrerpolicy="origin"
                      src="https://trustseal.enamad.ir/logo.aspx?id=142490&amp;Code=Zjn4ngVF9uVoACxtfycY"
                      alt=""
                      style="cursor: pointer"
                      code="Zjn4ngVF9uVoACxtfycY" /></a>
                  <img
                    referrerpolicy="origin"
                    id="nbqejxlzjxlzoeukjzpeoeuk"
                    style="cursor: pointer"
                    onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=211878&amp;p=uiwkrfthrfthmcsijyoemcsi", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                    alt="logo-samandehi"
                    src="https://logo.samandehi.ir/logo.aspx?id=211878&amp;p=odrfnbpdnbpdaqgwyndtaqgw" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="container">
        <p class="m-0">
          کلیه حقوق متعلق به سایت آی&zwnj;بولک می&zwnj;باشد. | طراحی و توسعه:
          <a target="_blank" href="https://tookan.tech">توکان تک</a>
        </p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap Bundle with Popper -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <?php $conn->close(); ?>
</body>

</html>