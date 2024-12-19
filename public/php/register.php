<?php
include 'db.php';
$errorCheck = '';
$successmassage = '';
$errormassage = '';

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address= $_POST['address'];
    
    $checkuser = $conn->prepare("SELECT email FROM user WHERE email=?");
    $checkuser->bindValue(1, $email);
    $checkuser->execute();

    if ($checkuser->rowCount() > 0) {
        $errorCheck = true; 
    } else {
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
        $result = $conn->prepare("INSERT INTO user (username, email, password, phone,address) VALUES (?, ?, ?, ?,?)");

        if (empty($username) || empty($email) || empty($password) || empty($phone) || empty($address))  {
            $errormassage = true; 
        } else {
            $result->bindValue(1, $username);
            $result->bindValue(2, $email);
            $result->bindValue(3, $hashedPassword); 
            $result->bindValue(4, $phone);
            $result->bindValue(5, $address);

            if ($result->execute()) {
                header('location:../views/login.php');
            } else {
                $successmassage = false; 
            }
        }
    }
}
?>
