<?php

session_start();
require("connection.php");

$user = $_SESSION["email"];
$name = $_POST["subject_name"];
$n_hours = $_POST["n_hours"];
$teacher = $_POST["teacher"];
$course_id = $_POST["course"];

$database-> update("subjects",[
    "subject_name" => $name,
    "n_hours" => $n_hours,
    "teacher" => $teacher,
    "email" => $user
], [
    "course_id" => $course_id
]);


?>