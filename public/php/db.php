<?php 
// session_start();
// include_once 'jdf.php'; 

$servername="localhost";
$username="root";
$password="";
$dbname="ibolak";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Error" . $e->getMessage();
}
