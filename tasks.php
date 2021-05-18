<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

</head>

<body>

    <?php

    include "connection.php";
    session_start();
    
    if (isset($_SESSION["email"])) {
        require "menu.php";
        $subject_id = $_GET["subject"];
        echo "<h1  class=\"pt-12 mt-12\">" . "Tareas" . "</h1>";

        if ($subject_id != null) {

            $tasks = $database->select("tasks", "*", [
                "subject_id" => $subject_id
            ]);
            printTaskTableHeader();
            printTaskTable($tasks);
        } else {

            $tasks = $database->select("tasks", "*", [
                "email" => $_SESSION["email"]
            ]);
            printTaskTableHeader();
            printTaskTable($tasks);
        }
    } else {
        header("Location: login/login.php");
    }

    function printTaskTableHeader()
    {
        echo "<table>";
        echo    "<thead>";
        echo        "<tr>";
        echo           "<th>Tarea</th>";
        echo           "<th>Descripción</th>";
        echo            "<th>Fecha de Inicio</th>";
        echo            "<th>Fecha Entrega</th>";
        echo            "<th>Estado</th>";
        echo            "<th>Asignatura</th>";
        echo            "<th>Acciones</th>";
        echo        "</tr>";
        echo    "</thead>";
        echo    "<tbody>";
    }

    function printTaskTable($tasks)
    {
        foreach ($tasks as $task) {

            echo        "<tr>";
            echo           "<td>" . $task["task_name"] . "</td>";
            echo           "<td>" . $task["description"] . "</td>";
            echo            "<td>" . $task["date_start"] . "</td>";
            echo            "<td>" . $task["date_end"] . "</td>";

            $showStatus = $task["status"];
            if($showStatus == "started") {
                $showStatus = "Iniciada";
            } elseif($showStatus == "hold") {
                $showStatus = "En Espera";
            } else {
                $showStatus = "Cerrada";
            }

            echo            "<td>" . $showStatus . "</td>";
            echo            "<td>
            <a href=\"forms/edit_task.php?taskid=" . $task["idtasks"] . "\">
            <i class=\"material-icons-outlined\">edit</i></a>
            <a href=\"actions/delete_tasks.php?taskid=" . $task["idtasks"] . "\"><i class=\"material-icons-outlined\">delete</i></a>
                    </td>";
            echo        "</tr>";
        }
        echo    "</tbody>";
        echo   " </table>";

        echo '<a href="forms/add_task.php">Añadir tarea</a>';

    }


    ?>

</body>

</html>