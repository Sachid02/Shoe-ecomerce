<?php

include("../includes/connection.php");
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

$sql = sprintf("SELECT id,email,role_id,password FROM users WHERE email = '%s'", $email);

$result = $conn->query($sql);
$rows = $result->fetch_row();

if ($result->num_rows == 0) {
    echo "<h1>Invalid email or password</h1>";
    exit();
}

$hashed_password = $rows[3];
$verified_password = password_verify($password, $hashed_password);

if (!$verified_password) {
    echo "<h1>Invalid email or password</h1>";
    exit();
}

$_SESSION["message"] = "Logged in successfully";
$_SESSION["userID"] = $rows[0];

header("Location: /ecommerce/");

?>