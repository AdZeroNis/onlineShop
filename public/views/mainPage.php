<?php  
include '../php/profile.php';


?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/mainPage.css" />
  <link rel="stylesheet" href="../assets/css/sidbar.css" />
  <link rel="stylesheet" href="../assets/css/header.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.css" />
  <title>MainPage</title>
</head>

<body>
  <div class="MainPage">
    <div class="SideBar">
      <div class="SidBar">
        <div class="topSideBar">
          <!-- <div class="imageUser">
           
          </div> -->
          <div class="nameUser">
            <span><?php echo $users['username']; ?></span>
          </div>
          <div class="wellcome">
            <span>عزیز خوش آمدید</span>
          </div>
        </div>
        <ul>
          <a href="./userCounter.html" class="item">
            <img src="../assets/svg/element-2 1.svg" alt="pishkhan" />
            <li>پیشخوان کاربری</li>
          </a>
          <a href="./chart.html" class="item">
            <img src="../assets/svg/note-2 1.svg" alt="imageGozaresh" />
            <li>گزارش </li>
          </a>
          <a href="./sabteSefaresh.php" class="item">
            <img src="../assets/svg/note-1 1.svg" alt="imageSefaresh" />
            <li>لیست محصولات</li>
          </a>
          <a href="./orders.php" class="item">
            <img
              src="../assets/svg/receipt-item 1.svg"
              alt="imageSoratHesab" />
            <li>لیست سفارشات</li>
          </a>
          <a href="login.php" class="item">
            <li class="items">
              <img src="../assets/svg/logout-1 1.svg" alt="" />
              <a href="../php/logout.php">خروج</a>
            </li>
          </a>
        </ul>
      </div>
    </div>
    <div class="leftSide">
      <div class="Header">
        <div class="Header">
          <div class="iamgeClock">
            <img src="../assets/svg/Vector.svg" alt="clock" />
          </div>
          <div class="date">
            <span> امروز 22 / 09 / 1402 </span>
          </div>
        </div>
      </div>
      <div class="Outlet"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/js/mainPage.js"></script>
</body>

</html>