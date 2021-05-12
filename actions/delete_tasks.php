<?php

session_start();
require("connection.php");
$task_id = $_GET["taskid"];

$database->delete("tasks", [

    "idtasks"=> $task_id

]);

header("Location: ../tasks.php");

?>