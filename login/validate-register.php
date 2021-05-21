<?php 

require("connection.php");
session_start();

$username = $_POST["email"];
$pwd = $_POST["password"];

$new = $database->insert("users",[
    "email" => $username,
    "password" => $pwd
]);

$conn = $database->select("users", "*",[
    "email"=>$username,
    "password"=>$pwd
]);

if($conn!=false) {
    $_SESSION["email"] = $conn[0]["email"];
    header("location: ../index.php");
} else {
    header("location: register.php?error=wrong_credentials");
}
