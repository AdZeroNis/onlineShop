<?php
include '../php/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->prepare("SELECT * FROM products WHERE id=?");
    $result->bindValue(1, $id);
    $result->execute();
    $products = $result->fetch(PDO::FETCH_ASSOC);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    if (isset($_POST['product_name']) && isset($_POST['price']) && isset($_POST['size']) && isset($_POST['color']) && isset($_POST['description'])) {


        $image_path = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "../uploads/Products/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $image_path = $target_file;
        }


        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $description = $_POST['description'];


        $updateStmt = $conn->prepare("UPDATE products SET product_name=?, price=?, size=?, color=?, description=?, image_path=? WHERE id=?");
        $updateStmt->bindValue(1, $product_name);
        $updateStmt->bindValue(2, $price);
        $updateStmt->bindValue(3, $size);
        $updateStmt->bindValue(4, $color);
        $updateStmt->bindValue(5, $description);
        $updateStmt->bindValue(6, $image_path);
        $updateStmt->bindValue(7, $id);


        $updateStmt->execute();


        header("Location: ../views/mainPage.php");
        exit;
    } else {
        echo "Error: Missing data in the form!";
    }
}
