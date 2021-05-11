<?php
session_start();
require("connection.php");

$subject_id = $_GET["subjectid"];

$tasks = $database->select("tasks", "*", [
    "subject_id" => $subject_id

]);

if($tasks) {

}else {
    $database->delete("subjects", [
        "subject_id" => $subject_id
    ]);
}



?>