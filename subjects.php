<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Asignaturas</title>
</head>

<body>
    <?php
    include "connection.php";
    session_start();
    
    if (isset($_SESSION["email"])) {
        $course_code = $_GET["course"];
        require "menu.php";


        if ($course_code != null) {
            echo "<h1  class=\"pt-12 mt-12\">" . $course_code . "</h1";
            $subjects = $database->select("subjects", "*", [
                "course_id" => $course_code
            ]);
            printTableHeader();
            printTable($subjects);

           
        } else {
            $subjects = $database->select("subjects", "*", [
                "email" => $_SESSION["email"]
            ]);
            echo "<h1  class=\"pt-12 mt-12\">" . "No hay ningún curso" . "</h1";

           printTableHeader();
           printTable($subjects);
        }
    } else {
        header("Location: login/login.php");

    }

    function printTableHeader()
    {
        echo "<h3>ESTAS SON TODAS TUS ASIGNATURAS</h3>";
        echo "<table class=\"highlight\">";
        echo    "<thead>";
        echo        "<tr>";
        echo           "<th>Nombre Asignatura</th>";
        echo            "<th>Número de horas</th>";
        echo            "<th>Profesor</th>";
        echo            "<th>Acciones</th>";
        echo            "<th>Ver Tareas</th>";
        echo        "</tr>";
        echo    "</thead>";
        echo    "<tbody>";
    }

    function printTable($subjects)
    {
        foreach ($subjects as $subject) {
            echo "<h1>" . $subject["subject_name"] . "<h1>";
            echo        "<tr>";
            echo           "<td>" . $subject["subject_name"] . "</td>";
            echo            "<td>" . $subject["n_hours"] . "</td>";
            echo            "<td>" . $subject["teacher"] . "</td>";
            echo            "<td>
                            <a href=\"forms/edit_subject.php?subjectid=" . $subject["idsubjects"] . "\">
                            <i class=\"material-icons-outlined\">edit</i></a>
                            <a href=\"actions/delete_subject.php?subjectid=" . $subject["idsubjects"] . "\"><i class=\"material-icons-outlined\">delete</i></a>
                                            </td>";
            echo            "<td><a href=\"tasks.php?subject=". $subject["idsubjects"] . "\">" . " Ver tareas</a></td>";

            echo        "</tr>";
        }
        echo    "</tbody>";
        echo   " </table>";

        echo '<a href="forms/add_subject.php">Añadir tarea</a>';
    }

    ?>

</body>

</html>