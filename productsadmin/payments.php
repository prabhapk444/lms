<?php
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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

        *{
            background-color:#fffffe;
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
  
    $selectQuery = "SELECT payment_id ,product_id, name, amount, state FROM payment";
    $result = $conn->query($selectQuery);
    if ($result === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
       
        if ($result->num_rows > 0) {
        
            echo "<table>";
            echo "<tr><th>Payment_Id</th><th>Product_Id</th><th>Name</th><th>Amount</th><th>State</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["payment_id"] . "</td>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
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
