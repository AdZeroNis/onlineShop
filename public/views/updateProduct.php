<?php
include '../php/profile.php';
include '../php/updateProduct.php';


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
    <title>آپدیت محصول</title>
    <style>
        body {
            font-family: "IranSans";
        }

        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select,
        textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #0f155c;
            outline: none;
            box-shadow: 0 0 5px rgba(60, 128, 35, 0.3);
        }

        textarea {
            resize: none;
        }

        .form-actions {
            grid-column: span 2;
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 12px 20px;
            background-color: #0f155c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #333978;
        }

        svg {
            margin-top: 5px;
        }
    
    </style>
</head>

<body>
    <div class="MainPage">
        <div class="SideBar">
            <div class="SidBar">
                <div class="topSideBar">
                    <div class="nameUser">
                        <span><?php echo $users['username']; ?></span>
                    </div>

                    <a style="  text-decoration: none;
            color: white;" href="./index.php">صفحه ی اول</a>
                </div>
                <ul>
                    <a href="./userCounter.php" class="item">
                        <img src="../assets/svg/element-2 1.svg" alt="pishkhan" />
                        <li>پیشخوان کاربری</li>
                    </a>
                    <a href="./userCounter.php" class="item afterClick">
                        <img src="../assets/svg/element-2 1.svg" alt="pishkhan" />
                        <li>آپدیت محصول</li>
                    </a>
                    <a href="./sabteSefaresh.php" class="item">
                        <img src="../assets/svg/note-1 1.svg" alt="imageSefaresh" />
                        <li>لیست محصولات</li>
                    </a>
                    <a href="./finalOrders.php" class="item">
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
                            action=""
                            method="post"
                            enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="productName">نام محصول:</label>
                                    <input type="text" id="productName" name="product_name" required value="<?php echo $products['product_name']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label for="price">قیمت (تومان):</label>
                                    <input type="number" id="price" name="price" required value="<?php echo $products['price']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label for="size">اندازه:</label>
                                    <select id="size" name="size" required>
                                        <option value="small" <?php echo $products['size'] == 'small' ? 'selected' : ''; ?>>کوچک</option>
                                        <option value="medium" <?php echo $products['size'] == 'medium' ? 'selected' : ''; ?>>متوسط</option>
                                        <option value="large" <?php echo $products['size'] == 'large' ? 'selected' : ''; ?>>بزرگ</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="color">رنگ:</label>
                                    <input type="text" id="color" name="color" required value="<?php echo $products['color']; ?>" />
                                </div>

                                <!-- <div class="form-group">
                                    <label for="stock">تعداد :</label>
                                    <input type="number" id="stock" name="stock" required />
                                </div> -->
                                <div class="form-group">
                                    <label for="image">آپلود تصویر:</label>
                                    <!-- نمایش تصویر فعلی -->
                                    <?php if ($products['image_path']): ?>
                                        <img src="<?php echo ($products['image_path']); ?>" alt="Product Image" style="width: 100px; height: auto;" />
                                    <?php else: ?>
                                        <p>تصویری برای این محصول موجود نیست.</p>
                                    <?php endif; ?>
                                    <!-- ورودی برای بارگذاری تصویر جدید -->
                                    <input type="file" id="image" name="image" />
                                </div>



                                <div class="form-group">
                                    <label for="description">توضیحات:</label>
                                    <textarea id="description" name="description" rows="4" placeholder="توضیحات محصول را وارد کنید..." required><?php echo $products['description']; ?></textarea>

                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" name="Record">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>
</body>

</html>