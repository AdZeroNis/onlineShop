<?php
include 'db.php';
$errorCheck = '';
$successmassage = '';
$errormassage = '';

$errors = ['usernameError' => '', 'emailError' => '', 'passwordError' => '', 'phoneError' => '', 'addressError' => ''];

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // پترن‌ها
    $usernamePattern = "/^(?![0-9])[A-Za-z0-9]{3,}$/u";
    $passwordPattern = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}/";
    $phoneNumberPattern = "/^0\d{10}$/";
    $emailPattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";
   

    // اعتبارسنجی ورودی‌ها
    if (empty($username) || !preg_match($usernamePattern, $username)) {
        $errors['usernameError'] = "نام کاربری نامعتبر است.";
    }

    if (empty($email) || !preg_match($emailPattern, $email)) {
        $errors['emailError'] = "ایمیل نامعتبر است.";
    }

    if (empty($password) || !preg_match($passwordPattern, $password)) {
        $errors['passwordError'] = "رمز عبور نامعتبر است";
    }

    if (empty($phone) || !preg_match($phoneNumberPattern, $phone)) {
        $errors['phoneError'] = "شماره تلفن نامعتبر است.";
    }

    if (empty($address)) {
        $errors['addressError'] = "آدرس نامعتبر است.";
    }

    // بررسی وجود ایمیل در پایگاه داده
    $checkuser = $conn->prepare("SELECT email FROM user WHERE email=?");
    $checkuser->bindValue(1, $email);
    $checkuser->execute();

    if ($checkuser->rowCount() > 0) {
        $errorCheck = true;
        $errors['emailError'] = "این ایمیل قبلاً ثبت شده است.";
    }

    // اگر هیچ اروری نباشد، ذخیره اطلاعات کاربر
    if (!array_filter($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $result = $conn->prepare("INSERT INTO user (username, email, password, phone, address) VALUES (?, ?, ?, ?, ?)");

        $result->bindValue(1, $username);
        $result->bindValue(2, $email);
        $result->bindValue(3, $hashedPassword);
        $result->bindValue(4, $phone);
        $result->bindValue(5, $address);

        if ($result->execute()) {
            header('location:../views/login.php');
        } else {
            $errormassage = true;
        }
    }
}
?>
