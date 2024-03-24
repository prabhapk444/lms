<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <style>
    .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
          
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }

        
        label {
            font-weight: bold;
        }

      
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

       
        button[type="submit"] {
            background-color: #ffc107;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #ff9800;
        }
    </style>
</head>
<body>
    <center><h3>Update products</h3></center>
    <div class="container mt-5 h-100">
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group mb-2">
    <label for="product_id">Product Id:</label>
    <input type="text" class="form-control" id="product_id" name="product_id" required>
</div>


            <div class="form-group mb-2">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            
            <!-- <div class="form-group mb-2">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="skin">Skin</option>
                    <option value="hair">Hair</option>
                    <option value="combo">combo</option>
                    <option value="gardening">Gardening</option> -->
                <!-- </select> -->
            
            <!-- <div class="form-group mb-2">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="tools">Tools</option>
                    <option value="plants">Plants</option>
                </select>
            </div> -->
            <!-- <div class="form-group mb-2">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div> -->
            <div class="form-group mb-2">
                <label for="price">Price:</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="price" value="1.00" name="price" step="0.01" required>
                </div>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <!-- <div class="form-group mb-2">
                <label for="availability">Availability:</label>
                <input type="number" class="form-control" id="availability" name="availability" required>
            </div> -->
            <div class="form-group mb-2">
                <label for="image">Product Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>
    <?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"]; 
    $productName = $_POST["product_name"];
    $price =  $_POST["price"]; 
    $quantity = $_POST["quantity"];
 


    $image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : $_POST["existing_image"];

    $uploadsPath = $_SERVER['DOCUMENT_ROOT'] . "/lms/uploads/";

   
    if(isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
       
        $targetFile = $uploadsPath . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    } else {
    
        $targetFile = $uploadsPath . $image;
    }

   
    $sql = "UPDATE products SET product_name=?,price=?, quantity=?, image=? WHERE product_id=?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $productName,$price, $quantity, $targetFile, $productId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>



      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
