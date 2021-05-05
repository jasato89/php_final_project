<?php 

require("connection.php");
session_start();

$username = $_POST["email"];
$pwd = $_POST["password"];

$conn = $database->select("users", "*",[
    "email"=>$username,
    "password"=>$pwd
]);

if($conn!=false) {
    $_SESSION["email"] = $data[0]["email"];
    header("location: ../index.php");
} else {
    header("location: login.php?error=wrong_credentials");
}
