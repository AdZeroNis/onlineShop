<?php include '../php/profile.php'; ?>
<a
    class="d-flex"
    style="margin-top: 0 !important"
    href="https://ibolak.com/link/redirect/d223d"
    target="_blank">
    <picture class="w-100">
      <img
        src="https://gooshishop.com/images/thumbs/n/Entity/0076022_desktop-5.jpeg"
        style="object-fit: cover; height: 60px"
        class="w-100"
        alt="بنر بالای هدر" />
    </picture>
  </a>

  <div class="container mt-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <div class="d-flex align-items-center">
        <!-- Basket button -->
        <a href="../views/basket.php" class="btn btn-outline-secondary btn-with-icon fs-7">
          <img src="https://ibolak.com/assets/icons/basket.svg" alt="Basket icon" />
          <span>سبد خرید</span>
          <span class="btn-badge bg-light" id="basket-count-badge"></span>
        </a>

        <!-- User account -->
        <div class="dropdown">
          <?php if (isset($_SESSION['signin']) && $_SESSION['signin'] === true) { ?>

            <?php if ($_SESSION['role'] == 1) { ?>
              <!-- If the user is an admin, show dropdown with hover effect -->
              <a href="#" class="btn btn-primary btn-with-icon me-2 ps-4 fs-7 dropdown-toggle" id="userDropdown">
                <img src="https://ibolak.com/assets/icons/user.svg" alt="User icon" />
                <span><?php echo $users['username']; ?></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="./mainPage.php">پنل ادمین</a>
                <a class="dropdown-item" href="./profile.php">پروفایل </a>
                <a class="dropdown-item" href="./ordersListUsers.php">لیست سفارشات </a>
              </div>

            <?php } else { ?>
              <!-- If the user is not an admin, just show the account link without dropdown -->
              <a href="#" class="btn btn-primary btn-with-icon me-2 ps-4 fs-7">
                <img src="https://ibolak.com/assets/icons/user.svg" alt="User icon" />
                <span><?php echo $users['username']; ?></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="./profile.php">پروفایل </a>
                <a class="dropdown-item" href="./ordersListUsers.php">لیست سفارشات </a>
              </div>
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
            placeholder="جستجو در گوشی شاپ"
            class="form-control" />
        </form>
      </div>
      <a href="./index.php" title="">
        <img
          src="https://gooshishop.com/images/thumbs/n/Entity/0039711_logo-blue.png"
          height="50"
          alt="آی&zwnj;بولک" />
      </a>
    </div>
  </div>