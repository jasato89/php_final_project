<?php

session_start();
require("connection.php");

$task_name = $_POST["task_name"];
$subject_id = $_POST["subject"];
$date_start = $_POST["date_start"];
$date_end = $_POST["date_end"];
$status = $_POST["status"];
$description = $_POST["description"];
$taskid = $_POST["taskid"];
$user = $_SESSION["email"];


$database-> update("tasks",[
    "task_name" => $task_name,
    "subject_id" => $subject_id,
    "date_start" => $date_start,
    "date_end" => $date_end,
    "status" => $status,
    "description" => $description,
    "email" => $user
], [
    "idtasks" => $taskid
]);

header("Location: ../tasks.php");


?>
