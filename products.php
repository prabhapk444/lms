<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo "Welcome, " . $_SESSION['username'] . "!";
} else {
    header("Location: productslogin.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
 
 .video-container {
    position: relative;
    overflow: hidden;
    padding-bottom: 56.25%; 
    margin: 20px 0;
    border-radius: 8px;
    
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 140;
    width: 70%;
    height: 70%;
    border: 2px solid blue;
    border-radius: 8px;
}
.smaller-input {
    width: 200px;
}

@media (max-width: 998px) {
    .video-container iframe {
        margin-left: 0; }
}

</style>
<body>



<br><br>
<center><h3>Products</h3></center><br>
<div class="container mt-2">
    <form method="get" action="">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for products..." name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
            </div>
        </div>
    </form>
</div><br><br>
<div class="video-container">
        <iframe src="./images/vd2.mp4" frameborder="0" allowfullscreen></iframe>
    </div>

<?php
include("dbcon.php");

$search = isset($_GET['search']) ? $_GET['search'] : '';

$selectQuery = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
$result = $conn->query($selectQuery);

if ($result === false) {
    echo "Error retrieving data: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-lg-4 col-md-4 col-sm-8 mb-4">';
            echo '<div class="card h-100 shadow">';
            echo '<img src="./uploads/' . basename($row["image"]) . '" class="card-img-top" alt="' . $row["product_name"] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title product-name">' . $row["product_name"] . '</h5>';
            echo '<p class="card-text"><strong>Price:</strong> ₹' . $row["price"] . '</p>';
            echo '<p class="card-text"><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
            echo '<button class="btn btn-warning view_prod" data-id="' . $row['product_id'] . '"><i class="fa fa-eye"></i> View</button>';
            echo '<form method="post" action="add_to_cart.php" class="mt-3">';
            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
            echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
            echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
            echo '<div class="input-group">';
            echo '<span class="input-group-text">Quantity</span>';
            echo '<input type="number" class="form-control" name="quantity" value="1" min="1">';
            echo '</div>';
            echo '<button type="submit" class="btn btn-warning mt-3" name="add_to_cart">Add to Cart</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "No records found in the products table.";
    }
}

$conn->close();
?>

<script>
    $(document).ready(function() {
        $('.view_prod').click(function() {
            var productId = $(this).data('id');
            var productName = $(this).closest('.card-body').find('.product-name').text();
            Swal.fire({
                title: productName,
                html: '<p><strong>Product ID:</strong> ' + productId + '</p>',
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });
    });
</script>

</body>
</html>
