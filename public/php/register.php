<?php
include 'db.php';
// session_start();
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
 

    if (empty($username) || empty($email) || empty($password) || empty($phone)) {
    } else {
       
        $checkuser = $conn->prepare("SELECT email FROM user WHERE email=?");
        $checkuser->bindValue(1, $email);
        $checkuser->execute();

        if ($checkuser->rowCount() > 0) {
            echo "ورود کنید";
        } else {
        
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

          
            $result = $conn->prepare("INSERT INTO user (username, email, password, phone) VALUES (?, ?, ?,?)");
            $result->bindValue(1, $username);
            $result->bindValue(2, $email);
            $result->bindValue(3, $hashedPassword); 
            $result->bindValue(4, $phone);
         
            
            if ($result->execute()) {
                // $_SESSION['signin'] = true;
                // $_SESSION['email'] = $email;
                // $_SESSION['phone'] = $phone;
                // $_SESSION['username'] = $username;
                header('location:./../views/index.html');
                exit();
            } else {
                
                echo "Error: " . $result->errorInfo()[2];
            }
        }
    }
}
?>
