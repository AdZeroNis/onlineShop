<?php
include 'db.php';
include 'register.php';

if(isset($_POST['login'])){
    $username=$_POST['usernamee'];
    $password=$_POST['passwordd'];

    $result = $conn->prepare("SELECT * FROM `user` WHERE username=? AND password=?");
    if(empty($username)|| empty($password)){
        $errormassage=true;
    }else{
        $result->bindParam(1, $username);
        $result->bindParam(2, $password);
        $result->execute();
        if ($result->rowCount()>0){
            $rows=$result->fetch(PDO::FETCH_ASSOC);
            // $_SESSION['signin']=true;
            // $_SESSION['email']=$email;
            // $_SESSION['password']=$password;
            // $_SESSION['age'] = $rows['age'];
            // $_SESSION['username'] = $rows['username'];
            // $_SESSION['role'] = $rows['role'];
            // if(isset($_POST['rem'])){
            //     setcookie('email',$_SESSION['email'],time()+60*60*24*7,'/'); 
            //     setcookie('password',$_SESSION['password'],time()+60*60*24*7,'/');          
            //  }

            header('location:./../views/index.html');
             exit();
    } else {
        
        echo "Error: " . $result->errorInfo()[2];
    }
    }
    
}
?>