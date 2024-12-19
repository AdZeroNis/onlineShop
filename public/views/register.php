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
</head>

<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="register-container" id="register">
                <div class="top">
                    <span>حساب کاربری دارید؟ <a href="login.php">ورود</a></span>
                    <img src="https://ibolak.com/storage/image/2024/6/1718807353-TCMlDRbPFbA1CHFG.svg" id="imgHeader" alt="">
                </div>
                <form action="" method="POST" onsubmit="return validateRegisterForm(event)">
                    <div class="input-box">
                        <input type="text" name="username" id="username" class="input-field" placeholder="نام کاربری"  title="فقط حروف مجاز است">
                        <i class="bx bx-user"></i>
                        <span id="usernameError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="ایمیل"  title="لطفا ایمیل معتبر وارد کنید">
                        <i class="bx bx-envelope"></i>
                        <span id="emailError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="کلمه عبور" 
                            title="لطفا یک رمز عبور معتبر وارد کنید.(شامل حرف بزرگ،کوچک،عدد و عبارات خاص(@#&) و از 8 یا بیشتر کرکتر باشد)">
                        <i class="bx bx-lock-alt"></i>
                        <span id="passwordError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="number" name="phone" class="input-field" placeholder="شماره تلفن" 
                            title="لطفاً یک شماره تلفن معتبر (11 رقم که با 0 شروع می‌شود) وارد کنید">
                        <i class="bx bx-phone"></i>
                        <span id="PhoneError" class="error-message"></span>
                    </div>
                    <div class="input-box">
    <input type="text" name="address" id="address" class="input-field" placeholder="آدرس ">
    <i class="bx bx-home"></i>
    <span id="addressError" class="error-message"></span>
</div>


                    <div class="input-box">
                        <input type="submit" name="signup" class="submit" value="ثبت نام">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/register.js"></script>
    <?php  if($errorCheck){?>
  <script src="../assets/js/errorCheck.js"></script>
  <?php } ?>
<?php  if($successmassage){?>
  <script src="../assets/js/alertsuccess.js"></script>
  <?php } ?>
  <?php  if($errormassage){?>
  <script src="../assets/js/alerterror.js"></script>
  <?php } ?>

</body>

</html>