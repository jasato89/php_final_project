<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <title>Task Panel - Welcome</title>
</head>

<body>
    <?php
    session_start();
    require("connection.php");
    if (isset($_SESSION["email"])) {
        require("menu.php");


        $user = $_SESSION["email"];

        $courses = $database->select("courses", "*", [
            "email" => $user
        ]);
        if ($courses) {
            echo "<h3 class=\"mt-12 pt-12 bg-blue-200\">ESTE ES TU CURSO ACTUAL</h3>";
            echo "<table class=\"highlight\">";
            echo    "<thead>";
            echo        "<tr>";
            echo           "<th>Nombre Curso</th>";
            echo            "<th>Descripción</th>";
            echo            "<th>Fecha Inicio</th>";
            echo            "<th>Fecha Fin</th>";
            echo            "<th>Ver Asignaturas</th>";
            echo        "</tr>";
            echo    "</thead>";
            echo    "<tbody>";
            foreach ($courses as $course) {
                echo        "<tr>";
                echo           "<td>" . $course["course_name"] . "</td>";
                echo            "<td>" . $course["description"] . "</td>";
                echo            "<td>" . $course["year_start"] . "</td>";
                echo            "<td>" . $course["year_end"] . "</td>";
                echo            "<td><a href=\"subjects.php?course=". $course["idcourses"] . "\">" . " Ver asignaturas</a></td>";
            }
            echo    "</tbody>";
            echo   " </table>";
        }
    } else {
        header("Location: login/login.php");
    }
    ?>

</body>

</html>