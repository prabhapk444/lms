<?php
include('admin/dbcon.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class_id = $_POST['class_id'];

$query = mysqli_query($conn, "SELECT * FROM student WHERE username='$username' AND firstname='$firstname' AND lastname='$lastname' AND class_id = '$class_id'") or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0) {
    echo 'false'; 
} else {
  
    $insert_query = "INSERT INTO student (username, password, firstname, lastname, class_id, status) VALUES ('$username', '$password', '$firstname', '$lastname', '$class_id', 'Registered')";
    if (mysqli_query($conn, $insert_query)) {
        $id = mysqli_insert_id($conn);
        $_SESSION['id'] = $id; 
        echo 'true';
    } else {
        echo 'false'; 
    }
}
?>
