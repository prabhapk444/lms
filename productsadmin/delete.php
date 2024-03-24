<?php

include("db.php");
if(isset($_GET['delete_user'])) {
   
    $userId = $_GET['delete_user'];
    $sql = "DELETE FROM registration WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        echo "User with ID $userId has been deleted successfully";
        header("Location: dashboard.php"); 
        exit(); 
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    $conn->close();
} else {
   
   
}
?>