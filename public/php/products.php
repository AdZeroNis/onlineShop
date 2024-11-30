<?php
// اطلاعات اتصال به دیتابیس
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ibolak";

// اتصال به دیتابیس
$conn = new mysqli($host, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("اتصال به دیتابیس ناموفق بود: " . $conn->connect_error);
}

// بررسی ارسال فرم
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $description = $_POST['description'];

    $targetDir = "../uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'png', 'jpeg', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "<script>alert('فرمت تصویر نامعتبر است. فقط JPG، PNG، JPEG، و GIF مجاز است.');</script>";
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $stmt = $conn->prepare("INSERT INTO products (product_name, price, size, color, description, image_path) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdssss", $productName, $price, $size, $color, $description, $targetFilePath);

        if ($stmt->execute()) {
            echo "<script>
                    alert('محصول با موفقیت ثبت شد.');
                    window.location.href = '../views/mainPage.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('خطا در ثبت محصول: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('خطا در آپلود تصویر.');</script>";
    }
}

$conn->close();
