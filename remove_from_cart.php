<?php
session_start();
include("dbcon.php");

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

 
    $delete_query = "DELETE FROM cart WHERE product_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
       
        header("Location: add_to_cart.php"); 
        exit();
    } else {
        echo "Error removing item from cart: " . $stmt->error;
    }
    $stmt->close();
} else {
   
    header("Location: shopping_cart.php");
    exit();
}
?>
