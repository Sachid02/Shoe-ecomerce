<?php
include("../includes/connection.php");
session_start();
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];

$sql = sprintf("SELECT * FROM users WHERE email = '%s';", $email);
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>User with that email already exists.</h1>";
    exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = sprintf("INSERT INTO users (email, password, address) VALUES ('%s', '%s', '%s');", $email, $password, $address);

$res = $conn->query($sql);

$_SESSION["message"] = "Your account has been created successfully";
header("location: /ecommerce/login_form.php")



    ?>