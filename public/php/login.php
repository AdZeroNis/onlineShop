<?php
session_start();
include 'db.php';

$loginCheck = '';
$errormassage = '';
$successmassage = '';

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // بررسی اینکه ایمیل و رمز عبور خالی نباشند
    if (empty($email) || empty($password)) {
        $errormassage = 'ایمیل یا رمز عبور نباید خالی باشد.';
    } else {
        // جستجو برای کاربر با ایمیل وارد شده
        $result = $conn->prepare("SELECT * FROM user WHERE email=?");
        $result->bindValue(1, $email);
        $result->execute();

        // بررسی اینکه کاربر با این ایمیل وجود دارد یا خیر
        if ($result->rowCount() > 0) {
            $rows = $result->fetch(PDO::FETCH_ASSOC);
            $hashedPasswordFromDB = $rows['password'];

            // تطبیق رمز عبور وارد شده با رمز عبور هش شده در دیتابیس
            if (password_verify($password, $hashedPasswordFromDB)) {
                // تنظیم متغیرهای سشن پس از ورود موفق
                $_SESSION['signin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $rows['id'];
                $_SESSION['phone'] = $rows['phone'];
                $_SESSION['username'] = $rows['username'];
                $_SESSION['role'] = $rows['role'];

                // هدایت به صفحه اصلی یا پروفایل
                header('Location: ../views/index.php');
                exit;
            } else {
                $loginCheck = 'رمز عبور نامعتبر است.';
            }
        } else {
            $loginCheck = 'هیچ کاربری با این ایمیل یافت نشد.';
        }
    }
}
?>
