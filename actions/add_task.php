<?php
session_start();
require("connection.php");
$user = $_SESSION["email"];
$task_name = $_POST["task_name"];
$subject_id = $_POST["subject"];
$date_start = $_POST["date_start"];
$date_end = $_POST["date_end"];
$status = $_POST["status"];
$description = $_POST["description"];


$database->insert("tasks", [
    "task_name" => $task_name,
    "date_start" => $date_start,
    "date_end" => $date_end,
    "status" => $status,
    "description" => $description,
    "subject_id" => $subject_id,
    "email" => $user
]);

header("Location: ../tasks.php");

?>