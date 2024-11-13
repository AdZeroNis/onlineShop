<?php
include 'db.php';


if(isset($_POST['login'])){
    $username=$_POST['usernamee'];
    $password=$_POST['passwordd'];

    $result = $conn->prepare("SELECT * FROM `user` WHERE username=? ");
    if(empty($username)|| empty($password)){
        $errormassage=true;
    }else{
        $result->bindParam(1, $username);
        $result->bindParam(2, $password);
        $result->execute();
        if ($result->rowCount()>0){
            $rows=$result->fetch(PDO::FETCH_ASSOC);
            header('location:./../views/index.html');
             exit();
    } else {
        
        echo "Error: " . $result->errorInfo()[2];
    }
    }
    
}
?>