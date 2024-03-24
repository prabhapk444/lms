<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$department_id = $_POST['department_id'];

$query = mysqli_query($conn, "SELECT * FROM teacher WHERE firstname='$firstname' AND lastname='$lastname' AND department_id = '$department_id'") or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0) {
    echo 'false';
} else {
    mysqli_query($conn, "INSERT INTO teacher (firstname, lastname, department_id, username, password, teacher_status) VALUES ('$firstname', '$lastname', '$department_id', '$username', '$password', 'registered')") or die(mysqli_error());

    $id = mysqli_insert_id($conn);
    $_SESSION['id'] = $id;
    echo 'true';
}
?>
