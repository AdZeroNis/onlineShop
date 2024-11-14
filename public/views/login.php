<?php include "./../php/login.php"; ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/style2.css">
    <title>Ludiflex | Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="login-container" id="login">
                <div class="top">
                    <span>حساب کاربری ندارید؟ <a href="register.php">ثبت نام</a></span>
                    <img src="https://ibolak.com/storage/image/2024/6/1718807353-TCMlDRbPFbA1CHFG.svg" id="imgHeader" alt="">
                </div>
                <form action="" method="POST" onsubmit="return validateLoginForm(event)">
                    <div class="input-box">
                        <input type="text" name="usernamee" class="input-field" placeholder="نام کاربری" required title="فقط حروف مجاز است">
                        <i class="bx bx-user"></i>
                        <span id="usernameError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="password" name="passwordd" class="input-field" placeholder="کلمه عبور" required>
                        <i class="bx bx-lock-alt"></i>
                        <span id="passwordError" class="error-message"></span>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="ورود">
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

    <script src="../assets/js/js.js"></script>
</body>

</html>