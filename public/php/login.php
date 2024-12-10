<?php
session_start();
include 'db.php';

$loginCheck = '';
$errormassage = '';
$successmassage = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->prepare("SELECT * FROM user WHERE email=?");

    if (empty($email) || empty($password)) {
        $errormassage = 'Email or password cannot be empty.';
    } else {
        $result->bindParam(1, $email);
        $result->execute();

        if ($result->rowCount() > 0) {
            $rows = $result->fetch(PDO::FETCH_ASSOC);
            $hashedPasswordFromDB = $rows['password'];

            if (password_verify($password, $hashedPasswordFromDB)) {
                // Set session variables on successful login
                $_SESSION['signin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $rows['id']; // Store user ID in session
                $_SESSION['phone'] = $rows['phone'];
                $_SESSION['username'] = $rows['username'];
                $_SESSION['role'] = $rows['role'];

                // Redirect to profile or home page
                header('Location: ../views/index.php');
            } else {
                $loginCheck = 'Invalid password.';
            }
        } else {
            $loginCheck = 'No user found with this email.';
        }
    }
}
?>
