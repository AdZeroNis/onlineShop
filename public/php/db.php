<?php 
// session_start();
// include_once 'jdf.php'; 

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="ibolak";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Error" . $e->getMessage();
}
