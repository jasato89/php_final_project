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

<body class="h-screen" style="background-color: #6BBEE3;">
    <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('resources/background.jpg');">

        <?php
        include "connection.php";
        session_start();

        if (isset($_SESSION["email"])) {
            $course_code = $_GET["course"];

            echo "<div class=\"mb-16\">";
            require("menu.php");
            echo "</div>";


            if ($course_code != null) {
                $course = $database->select("courses", "*", [
                    "idcourses" => $course_code
                ]);
        ?>
                <div class="p-10 rounded flex flex-col items-center justify-center">
                    <h1 class="inline-block text-center bg-white m-2 p-2 text-2xl text-gray-600">Asignaturas de <?php echo $course[0]["course_name"]; ?></h1>
                </div>

                <?php

                $subjects = $database->select("subjects", "*", [
                    "course_id" => $course_code
                ]);

                echo '<div class="my-4 mx-2 flex flex-1 flex-wrap justify-center">';
                printTable($subjects);
                echo '</div>';
                ?>
                <div class="fixed bottom-4 right-4 transform hover:scale-125">
                    <a href="forms/add_subject.php" class="font-bold text-gray-700 shadow-xl bg-yellow-400 border-2 border-black rounded-full bg-white flex items-center justify-center font-mono h-16 w-16">
                        <div class="material-icons-outlined">
                            add
                        </div>
                    </a>
                </div>
            <?php
            } else {
                $subjects = $database->select("subjects", "*", [
                    "email" => $_SESSION["email"]
                ]);

            ?>

                <div class="p-10 rounded flex flex-col items-center justify-center">
                    <h1 class="inline-block text-center bg-white m-2 p-2 text-2xl text-gray-600">Todas tus asignaturas</h1>
                </div>
                <div class="my-4 mx-2 flex flex-1 flex-wrap justify-center">
                    <?php
                    printTable($subjects);
                    ?>
                </div>


                <div class="fixed bottom-4 right-4 transform hover:scale-125">
                    <a href="forms/add_subject.php" class="font-bold text-gray-700 shadow-xl bg-yellow-400 border-2 border-black rounded-full bg-white flex items-center justify-center font-mono h-16 w-16">
                        <div class="material-icons-outlined">
                            add
                        </div>
                    </a>
                </div>
            <?php
            }
        } else {
            header("Location: login/login.php");
        }



        function printTable($subjects)
        {
            ?>

            <?php foreach ($subjects as $subject) {
            ?>
                <div class="border-8 shadow-xl border-black m-2 text-gray-700 bg-yellow-300">
                    <div class="grid grid-cols-1 p-2">
                        <p class="px-2 py-2 font-semibold text-center text-xl"><?php echo $subject["subject_name"] ?></p>

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <h2 class="font-semibold text-sm px-2 py-2">N??mero de horas</h2>
                            <p class="px-2 py-2"><?php echo $subject["n_hours"]; ?></p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <h2 class="font-semibold text-sm px-2 py-2">Profesor</h2>
                            <p class="px-2 py-2"><?php echo $subject["teacher"]; ?></p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2">
                            <h2 class="font-semibold text-sm px-2 py-2">Acciones</h2>
                            <div class="flex flex-row px-2 py-2">
                                <a href="forms/edit_subject.php?subjectid=<?php echo $subject["idsubjects"]; ?>">
                                    <i class="material-icons-outlined">edit</i></a>
                                <a href="actions/delete_subject.php?subjectid=<?php echo $subject["idsubjects"]; ?>">
                                    <i class="material-icons-outlined">delete</i></a>
                            </div>
                        </div>
                        <a class="text-center bg-red-400 p-2 m-2 hover:bg-red-500 text-gray-200" href="tasks.php?subject=<?php echo $subject["idsubjects"]; ?>">Ver tareas</a>
                    </div>
                </div>
            <?php
            }

            ?>

        <?php
        }
        ?>


    </header>
</body>

</html>