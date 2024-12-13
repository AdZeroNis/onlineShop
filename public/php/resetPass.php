<?php
include '../php/db.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['signin']) || $_SESSION['signin'] !== true) {
    header('Location: ./login.php');
    exit;
}

$id = $_SESSION['user_id'];

// Error messages initialization
$errors = ['current_password' => '', 'new_password' => '', 'confirm_password' => ''];

if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Regular expression pattern for the new password
    $passwordPattern = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}/";

    // Fetch the user data
    $result = $conn->prepare("SELECT password FROM user WHERE id=?");
    $result->bindValue(1, $id);
    $result->execute();
    $users = $result->fetch(PDO::FETCH_ASSOC);

    // Verify the current password
    if (!password_verify($current_password, $users['password'])) {
        $errors['current_password'] = 'رمز عبور فعلی نادرست است.';
    }

    // Check if new password matches confirm password
    if ($new_password !== $confirm_password) {
        $errors['confirm_password'] = 'رمز عبور جدید و تأیید رمز عبور مطابقت ندارد.';
    }

    // Check if new password meets the pattern
    if (!preg_match($passwordPattern, $new_password)) {
        $errors['new_password'] = 'رمز عبور جدید باید حداقل شامل یک حرف بزرگ، یک حرف کوچک، یک عدد، یک کاراکتر ویژه (!@#$%^&*) و حداقل ۸ کاراکتر باشد.';
    }

    // If no errors, update the password
    if (empty($errors['current_password']) && empty($errors['new_password']) && empty($errors['confirm_password'])) {
        $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);
        $updateStmt = $conn->prepare("UPDATE user SET password=? WHERE id=?");
        $updateStmt->bindValue(1, $new_password_hashed);
        $updateStmt->bindValue(2, $id);
        $updateStmt->execute();

        echo "<script>alert('رمز عبور با موفقیت تغییر کرد.');</script>";
        header('Location: ../views/index.php');
    }
}
?>
