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
  
    $selectQuery = "SELECT cart_id ,user_id,product_id, quantity FROM cart";
    $result = $conn->query($selectQuery);
    if ($result === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
       
        if ($result->num_rows > 0) {
        
            echo "<table>";
            echo "<tr><th>cart_id</th><th>user__Id</th><th>Product_Id</th><th>Quantity</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" .$row["cart_id"] ."</td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "</tr>";
            }

        
            echo "</table>";
        } else {
            echo "No records found in the payment table.";
        }
    }

    $conn->close();
?>

</body>
</html>
