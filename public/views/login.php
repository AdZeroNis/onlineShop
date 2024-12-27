<?php include "./../php/login.php"; ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <title>Ludiflex | Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="login-container" id="login">
                <div class="top">
                    <span>حساب کاربری ندارید؟ <a href="register.php">ثبت نام</a></span>
                    <img src="https://gooshishop.com/images/thumbs/n/Entity/0039711_logo-blue.png"" id="imgHeader" alt="">
                </div>
                <form action="" method="POST" onsubmit="return validateLoginForm(event)">
                <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="ایمیل"  title="لطفا ایمیل معتبر وارد کنید">
                        <i class="bx bx-envelope"></i>
                        <span id="emailError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="کلمه عبور" >
                        <i class="bx bx-lock-alt"></i>
                        <span id="passwordError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="submit" name="login" class="submit" value="ورود">
                    </div>
                    <div class="two-col">
                        <div class="two">
                            <label><a href="#">رمز عبور را فراموش کرده‌اید؟</a></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <script src="../assets/js/login.js"></script> -->
    <?php  if($errormassage){?>
  <script src="../assets/js/alerterror.js"></script>
  <?php } ?>
<?php  if($loginCheck){?>
  <script src="../assets/js/loginCheck.js"></script>
  <?php } ?>
<?php  if($successmassage){?>
  <script src="../assets/js/alertsuccess.js"></script>
  <?php } ?>
</body>

</html>