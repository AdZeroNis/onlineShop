<?php
include './db.php';

$id=$_GET['id'];

$result=$conn->prepare("DELETE FROM user WHERE id=?");
$result->bindValue(1,$id);
$result->execute();
header('location: ../views/mainPage.php');