<?php
session_start();
require("connection.php");

$course_code = $_GET["courseid"];

$subjects = $database -> select("subjects", "*", [
    "course_id" => $course_code
]);

if($subjects) {
    header("Location: ../index.php?errorcode=subjects");
} else {
    $result = $database->delete("courses", [
        "idcourses" => $course_code
    ]);
    header("Location: ../index.php");

}


