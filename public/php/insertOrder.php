<?php
include '../php/profile.php';


$user_id = $_SESSION['user_id'];


$query = "SELECT id, product_id FROM basket WHERE user_id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$basket_items = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $total_sum = isset($_POST['total_sum']) ? intval($_POST['total_sum']) : 0;
    $shipping_cost = 50000; 
    $final_price = $total_sum + $shipping_cost; 
    $address = isset($_POST['address']) ? $_POST['address'] : '';

  
    foreach ($basket_items as $item) {
        $product_id = $item['product_id'];

            
            $query = "INSERT INTO orders (user_id, basket_id, product_id, total_price, address) 
                      VALUES (:user_id, :basket_id, :product_id, :total_price, :address)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':basket_id', $item['id'], PDO::PARAM_INT); 
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':total_price', $final_price, PDO::PARAM_INT);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);

            
            if ($stmt->execute()) {
                
                header('location: ../views/ordersListUsers.php');
            } else {
                echo "خطا در افزودن به سفارشات.";
            }
    }

}
?>
