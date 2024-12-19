<?php

include '../php/db.php';


$sql = "SELECT *  FROM user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>
