<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        body {
           
            background-color: #f8f9fa;
        }

        .container {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
            background-color: #fffffe;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            border: 3px solid #ccc;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 20px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            transition: transform 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-details {
            display: flex;
            flex-direction: column;
        }

        .product-details h5 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-details p {
            margin-bottom: 8px;
            color: #495057;
        }

        .product-image {
            max-width: 100%; 
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <center>
            <h2>Product List</h2>
        </center>
        <div class="product-list">
            <?php
            include("db.php");

            $selectQuery = "SELECT product_name, price, quantity,image FROM products";
            $result = $conn->query($selectQuery);

            if ($result === false) {
                echo "Error retrieving data: " . $conn->error;
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product-card">';
                        echo '<div class="product-details">';
                        echo '<img src="/lms/uploads/' . basename($row["image"]) . '" alt="' . $row["product_name"] . '" class="product-image">';
                        echo '<h5>' . $row["product_name"] . '</h5>';
                        echo '<p><strong>Price:</strong> ₹' . $row["price"] . ' </p>';
                        echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
                        echo '</div>';
                       
                        echo '</div>';
                    }
                } else {
                    echo "No records found in the products table.";
                }
            }

            $conn->close();
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
