<?php
include 'db.php';
include 'register.php';
$loginCheck = '';
$errormassage = '';
$successmassage = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->prepare("SELECT * FROM `user` WHERE email=?");
    
    if (empty($email) || empty($password)) {
        $errormassage = true; 
    } else {
        $result->bindParam(1, $email);
        $result->execute();

    
        if ($result->rowCount() > 0) {
            $rows = $result->fetch(PDO::FETCH_ASSOC);
            $hashedPasswordFromDB = $rows['password']; 

     
            if (password_verify($password, $hashedPasswordFromDB)) {
          
                $_SESSION['signin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $rows['phone'];
                $_SESSION['username'] = $rows['username'];
                header('location:../views/index.html');
            } else {
                $loginCheck = true; 
            }
        } else {
            $loginCheck = true; 
        }
    }
}
?>
