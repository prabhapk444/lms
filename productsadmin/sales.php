<?php
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        @media only screen and (max-width: 600px) {
            th, td {
                display: block;
                width: 100%;
            }
        }
    </style>
</head>
<body>

   

<?php
include("db.php");

$selectQuery = "SELECT * FROM cart"; // Added "FROM" clause
$result = $conn->query($selectQuery);

if ($result === false) {
    echo "Error retrieving data: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>id</th><th>Product_Id</th><th>Product_Name</th><th>Price</th><th>Selling Quantity</th><th>Original Quantity</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["product_id"] . "</td>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td>₹" . $row["price"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>";
          
            $productId = $row["product_id"];
            $originalQuantityQuery = "SELECT quantity FROM products WHERE product_id = $productId";
            $originalQuantityResult = $conn->query($originalQuantityQuery);
            if ($originalQuantityResult->num_rows > 0) {
                $originalQuantityRow = $originalQuantityResult->fetch_assoc();
                echo $originalQuantityRow["quantity"];
            } else {
                echo "N/A"; 
            }
            echo "</td>"; 
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found in the cart table.";
    }
}

$conn->close();
?>

</body>
</html>
