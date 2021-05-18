<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

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

    ?>

            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <?php

                foreach ($courses as $course) {
                ?>
                    <div class="grid grid-cols-3">
                        <div class="col-start-1 col-end-2">
                            <h2><?php echo $course["course_name"]; ?></h2>
                        </div>
                        <div class="col-start-2 col-end-4 max-h-64 overflow-y-scroll">
                            <p><?php echo $course["description"]; ?></p>
                        </div>


                    </div>

                <?php
                }
                ?>


            </div>

    <?php

            echo "<table class=\"mx-auto max-w-4xl w-full whitespace-wrap  rounded-lg bg-white divide-y divide-gray-300 overflow-hidden\">";
            echo    "<thead class =\"bg-gray-50\">";
            echo        "<tr class =\"text-gray-600 text-left\">";
            echo           "<th class =\"font-semibold text-sm uppercase px-6 py-4\">Nombre Curso</th>";
            echo            "<th class =\"font-semibold text-sm uppercase px-6 py-4\">Descripción</th>";
            echo            "<th class =\"font-semibold text-sm uppercase px-6 py-4\">Fecha Inicio</th>";
            echo            "<th class =\"font-semibold text-sm uppercase px-6 py-4\">Fecha Fin</th>";
            echo            "<th class =\"font-semibold text-sm uppercase px-6 py-4\">Acciones</th>";
            echo            "<th class =\"font-semibold text-sm uppercase px-6 py-4\">Ver Asignaturas</th>";
            echo        "</tr>";
            echo    "</thead>";
            echo    "<tbody class=\"divide-y divide-gray-200\">";
            foreach ($courses as $course) {
                echo        "<tr>";
                echo           "<td class=\"px-6 py-4 text-center font-semibold text-blue-900\">" . $course["course_name"] . "</td>";
                echo            "<td><div class=\"text-center h-2 py-12 px-6 overflow-y-scroll\">" . $course["description"] . "</div></td>";
                echo            "<td class=\"px-6 py-4 text-center\">" . $course["year_start"] . "</td>";
                echo            "<td class=\"px-6 py-4 text-center\">" . $course["year_end"] . "</td>";
                echo            "<td class=\"px-6 py-4 text-center\">
                                        <a href=\"forms/edit_course.php?courseid=" . $course["idcourses"] . "\">
                                        <i class=\"material-icons-outlined\">edit</i></a>
                                        <a href=\"actions/delete_course.php?courseid=" . $course["idcourses"] . "\"><i class=\"material-icons-outlined\">delete</i></a>
        </td>";
                echo            "<td class=\"px-6 py-4 text-center\"><a class=\"text-purple-800 hover:underline\" href=\"subjects.php?course=" . $course["idcourses"] . "\">" . " Ver asignaturas</a></td>";
            }
            echo    "</tbody>";
            echo   " </table>";
        } else {
            require("forms/add_course.php");
        }
    } else {
        header("Location: login/login.php");
    }
    ?>

    <div class="flex justify-center">
        <a class="bg-green-500 p-2 m-2 rounded hover:bg-green-700 text-white" href="forms/add_course.php">Añadir Curso</a>
    </div>



</body>

</html>