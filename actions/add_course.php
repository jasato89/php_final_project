<?php

session_start();
require("connection.php");
$user = $_SESSION["email"];

$course_name = $_POST["course_name"];
$description = $_POST["description"];
$center = $_POST["center"];
$date_start = $_POST["date_start"];
$date_end = $_POST["date_end"];



$database->insert("courses", [
    "course_name" => $course_name,
    "center" => $center,
    "year_start" => $date_start,
    "year_end" => $date_end,
    "description" =>$description,
    "email" => $user
]);

header("Location: ../index.php");
