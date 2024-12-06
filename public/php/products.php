<?php

include './db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $description = $_POST['description'];

    $targetDir = "../uploads/Products/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'png', 'jpeg', 'gif','webp'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "<script>alert('فرمت تصویر نامعتبر است. فقط JPG، PNG، JPEG، و GIF,webp  مجاز است.');</script>";
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $stmt = $conn->prepare("INSERT INTO products (product_name, price, size, color, description, image_path) VALUES (:productName, :price, :size, :color, :description, :imagePath)");
  
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':imagePath', $targetFilePath);

        if ($stmt->execute()) {
            echo "<script>
                    alert('محصول با موفقیت ثبت شد.');
                    window.location.href = '../views/mainPage.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('خطا در ثبت محصول: " . $stmt->errorInfo()[2] . "');</script>";
        }
    } else {
        echo "<script>alert('خطا در آپلود تصویر.');</script>";
    }
}
?>