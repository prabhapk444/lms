<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminlogin.php");
    exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="css/styles.css" rel="stylesheet" />
        <style>
 * {
            font-family: 'Roboto', sans-serif;
        }
.counter {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .counter .main {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .counter .col {
        width: calc(50% - 20px); 
        margin-bottom: 20px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .counter .col:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .counter .col p {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333; 
    }

    .counter .col .counter-value {
        font-size: 36px;
        font-weight: bold;
        color: #272343; 
        transition: color 0.3s ease;
    }

    .counter .col:hover .counter-value {
        color: #ff6347;
    }
             h3{
            color:#272343;
            font-size:30px;
            font-weight:bold;

        }
        *{
            font-family: 'Roboto', sans-serif;
        }
            .col{
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .col a{
                text-decoration:none;
            }
        .color-change {
            animation: changeColor 20s infinite;
            font-size:25px;
            font-weight:bold;
            margin-top:60px;
        }

        @keyframes changeColor {
            0%, 10% {
                color: red;
            }
            20%, 30% {
                color: orange;
            }
            40%, 50% {
                color: yellow;
            }
            60%, 70% {
                color: green;
            }
            80%, 90% {
                color: blue;
            }
            100% {
                color: purple;
            }
        }
    </style>
    </head>
    <body>
    <?php
echo "<p>Welcome, $username!</p>";?>
        <div class="d-flex" id="wrapper">
            <div class="border-end bg-dark" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-dark text-white">Admin Dashboard</div>
                <div class="list-group list-group-flush bg-dark">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 text-white bg-dark" href="#users">Users</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 text-white bg-dark"  href="#products">Products</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 text-white bg-dark" href="#reviews">Reviews</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 text-white bg-dark" href="#Selling Report">Selling Report</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-white bg-dark border-bottom">
                    <div class="container-fluid bg-dark">
                        <button class="btn btn-warning" id="sidebarToggle"> Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse bg-dark" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <!-- <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li> -->
                                <li class="nav-item text-white"><a class="nav-link btn btn-warning" href="adminlogin.php">Logout</a></li>
                                <li class="nav-item dropdown">
                                    <!-- <a class="nav-link dropdown-toggle" id="navbarDropdown" href="adminlogin.php" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">logout</a> -->
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Edit Profile</a>
                                        <a class="dropdown-item" href="#!"></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-white" href="./../adminlogin.php">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
 




               <h3 behavior="scroll" direction="left" class="color-change">Users Information</h3>

                <section id="users">
                <?php
include("db.php");

$query = "SELECT * FROM registration";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<div class='container'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-primary'><tr><th>S.No</th><th>Username</th><th>Email</th><th>Address</th><th>password</th><th>Action</th></tr></thead><tbody>";


    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>"; 
        echo "<td>" . $row["address"] . "</td>"; 
        echo "<td>" .$row["password"]."</td>";
        echo "<td>
        <button class='btn btn-danger btn-sm' onclick='deleteUser(" . $row["id"] . ")'>Delete</button>
              </td>";
        echo "</tr>";
    }
    

    echo "</tbody></table>";
    echo "</div>";
} else {
    $query = "SELECT * FROM register";
    $result = $conn->query($query);
    
    echo "<div class='container'>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'><tr><th>S.No</th><th>Username</th><th>Email</th><th>Address</th><th>Action</th></tr></thead><tbody>";
    
    
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id']. "</td>";
            echo "<td>" . $row["Username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>
            <button class='btn btn-danger btn-sm' onclick='deleteUser(" . $row["id"] . ")'>Delete</button>
                  </td>";
            echo "</tr>";
    
        
        }
    } else {
        echo "<tr><td colspan='5'>No users available</td></tr>";
    }
    
    echo "</tbody></table>";
    echo "</div>";
    
    $conn->close();
}

?>
                </section>


                <h3 behavior="scroll" direction="left" class="color-change">Products</h3>



                <section id="products">
                   <?php
                   include("db.php");
                   ?>
                   <?php
   include("viewproducts.php");
  ?>
                    <div class="container">
                    <div class="row">
    <div class="col">
        <a href="addproducts.php"><i class="fas fa-plus-circle"></i> 
        Add</a>
    </div>
    <div class="col">
        <a href="deleteproducts.php"><i class="fas fa-trash-alt"></i>
        Delete</a>
    </div>
    <div class="col">
       <a href="updateproducts.php"><i class="fas fa-edit"></i>
        Update</a> 
    </div>
    <div class="col">
       <a href="view.php"><i class="fas fa-eye"></i>
        View</a> 
    </div>
</div>

                </section>



</section><br>

<center><h3>Selling Reports</h3></center>
<section id="Selling Report">
    <?php
    include("db.php");

    $productCountQuery = "SELECT COUNT(*) AS total_products FROM products";
    $productResult = $conn->query($productCountQuery);

    $cartCountQuery = "SELECT COUNT(*) AS total_orders FROM cart"; 
    $cartResult = $conn->query($cartCountQuery);

    if ($productResult === false || $cartResult === false) {
        echo "Error retrieving data: " . $conn->error;
    } else {
        
        $productRow = $productResult->fetch_assoc();
        $totalProducts = $productRow['total_products'];

        $cartRow = $cartResult->fetch_assoc(); 
        $totalOrders = $cartRow['total_orders']; 

        echo "<div class='col'>";
        echo "<p class='counter-value' data-count='$totalProducts'>$totalProducts</p>";
        echo "<p>Total Products</p>";
        echo "</div>";

        echo "<div class='col'>";
        echo "<p class='counter-value' data-count='$totalOrders'>$totalOrders</p>"; 
        echo "<p>Total Selling Products</p>"; 
        echo "</div>";
    }
    ?><br><br>


</section>

<?php
    include("sales.php");
    ?>


            </div>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js">
        </script>
        <script>
    function deleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "delete.php?delete_user=" + userId;
        }
    }
    $(document).ready(function() {
        $('.counter-value').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).data('count')
            }, {
                duration: 3000, 
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });

    
</script>

        
    </body>
</html>
