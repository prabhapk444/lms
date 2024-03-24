<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

<div class="container mt-5">
    <h3>Your Shopping Cart</h3>
    <div class="row">
        <?php
        session_start();
        include("dbcon.php");
        
        if (isset($_POST['add_to_cart'])) {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $totalAmount = $price * $quantity;
            
            $productData = array(
                'product_id' => $product_id,
                'product_name' => $product_name,
                'price' => $price,
                'quantity' => $quantity,
                'total_amount' => $totalAmount
            );
            
           
            $insert_query = "INSERT INTO cart (product_id, product_name, price, quantity, total_amount) 
                            VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("issis", $product_id, $product_name, $price, $quantity, $totalAmount);
            if ($stmt->execute()) {
                
            } else {
                echo "Error inserting product data into cart table: " . $stmt->error;
            }
            $stmt->close();
            
           
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            $_SESSION['cart'][] = $productData;
        }


        if (isset($_POST['buy_now'])) {
            foreach ($_SESSION['cart'] as $item) {
                $product_id = $item['product_id'];
                $quantity = $item['quantity'];
                $update_query = "UPDATE products SET quantity = quantity - ? WHERE product_id = ?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("ii", $quantity, $product_id);
                if ($stmt->execute()) {
                   
                    header("Location: index.php");
                    exit(); 
                } else {
                    echo "Error updating product quantity: " . $stmt->error;
                }
                $stmt->close();
            }
        }
        
           
          
        
        
       
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['product_id'];
            
            $sql = "SELECT image FROM products WHERE product_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $stmt->bind_result($image);
            $stmt->fetch();
            $stmt->close();
            
            echo '<div class="col-lg-4 col-md-4 col-sm-6 mb-4">';
            echo '<div class="card">';
            echo '<img src="/lms/uploads/' . basename($image) . '" alt="' . $item['product_name'] . '" class="card-img-top">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $item['product_name'] . '</h5>';
            echo '<p class="card-text"><strong>Price:</strong> ₹' . $item['price'] . '</p>';
            echo '<p class="card-text"><strong>Quantity:</strong> ' . $item['quantity'] . '</p>';
            echo '<p class="card-text"><strong>Total Price:</strong> ₹' . $item['total_amount'] . '</p>';
          
            echo '<form method="post" id="buyNowForm">';
            echo '<input type="hidden" name="product_id[]" value="' . $product_id . '">';
            echo '<input type="hidden" name="quantity[]" value="' . $item['quantity'] . '">';
            echo '<button type="submit" name="buy_now" class="btn btn-warning">Buy Now</button>';
            echo '</form>';
          
            echo '<form method="post" action="remove_from_cart.php">';
            echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
            echo '<button type="submit" class="btn btn-danger">Cancel</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

        
    </div>
    
    <input type="hidden" id="totalAmount" value="<?php echo calculateTotalAmount(); ?>">
    
   
</div>

<?php
function calculateTotalAmount() {
    $totalAmount = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalAmount += $item['total_amount'];
    }
    return $totalAmount;
}
?>
</body>
</html>
