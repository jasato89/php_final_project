<?php
session_start();
require("connection.php");
$user = $_SESSION["email"];

$subject_name = $_POST["subject_name"];
$teacher = $_POST["teacher"];
$n_hours = $_POST["n_hours"];
$course = $_POST["course"];

$database->insert("subjects", [
    "subject_name" => $subject_name,
    "n_hours" => $n_hours,
    "teacher" => $teacher,
    "course_id" => $course,
    "email" => $user 
]);

header("Location: ../subjects.php");

?>