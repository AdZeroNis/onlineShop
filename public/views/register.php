<?php include "./../php/register.php"; ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <title>Ludiflex | Register</title>
    <style>
        .text-danger {
            color: white;
            font-size: 12px;
        }

        .input-error {
            border: 2px solid red;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="register-container" id="register">
                <div class="top">
                    <span>حساب کاربری دارید؟ <a href="login.php">ورود</a></span>
                    <img src="https://gooshishop.com/images/thumbs/n/Entity/0039711_logo-blue.png"" id="imgHeader" alt="">
                </div>
                <form action="" method="POST" onsubmit="return validateRegisterForm(event)">
                    <div class="input-box">
                        <input type="text" name="username" id="username" class="input-field <?php echo $errors['usernameError'] ? 'input-error' : ''; ?>" placeholder="نام کاربری" title="فقط حروف مجاز است">
                        <i class="bx bx-user"></i>
                        <span class="text-danger"><?php echo $errors['usernameError']; ?></span>
                    </div>

                    <div class="input-box">
                        <input type="email" name="email" class="input-field <?php echo $errors['emailError'] ? 'input-error' : ''; ?>" placeholder="ایمیل" title="لطفا ایمیل معتبر وارد کنید">
                        <i class="bx bx-envelope"></i>
                        <span class="text-danger"><?php echo $errors['emailError']; ?></span>
                    </div>

                    <div class="input-box">
                        <input type="password" name="password" class="input-field <?php echo $errors['passwordError'] ? 'input-error' : ''; ?>" placeholder="کلمه عبور" title="لطفا یک رمز عبور معتبر وارد کنید.(شامل حرف بزرگ،کوچک،عدد و عبارات خاص(@#&) و از 8 یا بیشتر کرکتر باشد)">
                        <i class="bx bx-lock-alt"></i>
                        <span class="text-danger"><?php echo $errors['passwordError']; ?></span>
                    </div>

                    <div class="input-box">
                        <input type="number" name="phone" class="input-field <?php echo $errors['phoneError'] ? 'input-error' : ''; ?>" placeholder="شماره تلفن" title="لطفاً یک شماره تلفن معتبر (11 رقم که با 0 شروع می‌شود) وارد کنید">
                        <i class="bx bx-phone"></i>
                        <span class="text-danger"><?php echo $errors['phoneError']; ?></span>
                    </div>

                    <div class="input-box">
                        <input type="text" name="address" class="input-field <?php echo $errors['addressError'] ? 'input-error' : ''; ?>" placeholder="آدرس">
                        <i class="bx bx-home"></i>
                        <span class="text-danger"><?php echo $errors['addressError']; ?></span>
                    </div>

                    <div class="input-box">
                        <input type="submit" name="signup" class="submit" value="ثبت نام">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <script src="../assets/js/register.js"></script> -->
    <?php if ($errorCheck) { ?>
        <script src="../assets/js/errorCheck.js"></script>
    <?php } ?>
    <?php if ($successmassage) { ?>
        <script src="../assets/js/alertsuccess.js"></script>
    <?php } ?>
    <?php if ($errormassage) { ?>
        <script src="../assets/js/alerterror.js"></script>
    <?php } ?>

</body>

</html>