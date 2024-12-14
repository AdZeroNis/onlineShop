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
            <div class="Outlet">
                <div>
                    <div class="titleWrapper">
                        <h2>ویرایش محصول</h2>
                        <svg
                            width="260"
                            height="2"
                            viewBox="0 0 260 2"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M259.5 1H0" stroke="url(#paint0_linear)" />
                            <defs>
                                <linearGradient
                                    id="paint0_linear"
                                    x1="260"
                                    y1="1.99734"
                                    x2="0"
                                    y2="1.99734"
                                    gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0f155c" />
                                    <stop offset="1" stop-color="#0f155c" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="form-container">
                        <form
                            action="../php/products.php"
                            method="post"
                            enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="productName">نام محصول:</label>
                                    <input type="text" id="productName" name="productName" required />
                                </div>

                                <div class="form-group">
                                    <label for="price">قیمت (تومان):</label>
                                    <input type="number" id="price" name="price" required />
                                </div>

                                <div class="form-group">
                                    <label for="size">اندازه:</label>
                                    <select id="size" name="size" required>
                                        <option value="small">کوچک</option>
                                        <option value="medium">متوسط</option>
                                        <option value="large">بزرگ</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="color">رنگ:</label>
                                    <input type="text" id="color" name="color" required />
                                </div>

                                <div class="form-group">
                                    <label for="stock">تعداد :</label>
                                    <input type="number" id="stock" name="stock" required />
                                </div>

                                <div class="form-group">
                                    <label for="image">آپلود تصویر:</label>
                                    <input
                                        type="file"
                                        id="image"
                                        name="image"
                                        accept="image/*"
                                        required />
                                </div>

                                <div class="form-group">
                                    <label for="description">توضیحات:</label>
                                    <textarea
                                        id="description"
                                        name="description"
                                        rows="4"
                                        placeholder="توضیحات محصول را وارد کنید..."
                                        required></textarea>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>
    <script src="../assets/js/mainPage.js"></script>
</body>

</html>