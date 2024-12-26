<?php
// profile.php
include '../php/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;
}

$id = $_SESSION['user_id'];

$result = $conn->prepare("SELECT * FROM user WHERE id=?");
$result->bindValue(1, $id);
$result->execute();
$users = $result->fetch(PDO::FETCH_ASSOC); 

if (!$users) {
    die('User not found.');
}


if (isset($_POST['edit_profile'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address= $_POST['address'];
        // Update the user details in the database
        $updateStmt = $conn->prepare("UPDATE user SET username=?, email=?, phone=?,address=? WHERE id=?");
        $updateStmt->bindValue(1, $username);
        $updateStmt->bindValue(2, $email);
        $updateStmt->bindValue(3, $phone);
        $updateStmt->bindValue(4, $address);  
     
        $updateStmt->bindValue(5, $id);
        $updateStmt->execute();

        header("Location: index.php?id=" . $id); 
        exit;
    } 
