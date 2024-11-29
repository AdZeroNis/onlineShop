<?php
session_start(); 
if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
   
    header('Location: ./login.php');
    exit; 
}
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
            <div class="imageUser">
              <img src="../assets/img/prof.jpg" alt="imageUser" />
            </div>
            <div class="nameUser">
            <span><?php echo $_SESSION['username']; ?></span> 
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
            <a href="./sabteSefaresh.html" class="item">
              <img src="../assets/svg/note-1 1.svg" alt="imageSefaresh" />
              <li>ثبت سفارش</li>
            </a>
            <a href="./soratHesab.html" class="item">
              <img
                src="../assets/svg/receipt-item 1.svg"
                alt="imageSoratHesab"
              />
              <li>صورتحساب</li>
            </a>
            <a href="login.php" class="item">
              <img src="../assets/svg/logout-1 1.svg" alt="" />
              <li><a href="../php/logout.php">خروج</a></li>
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
