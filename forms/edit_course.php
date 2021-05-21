<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Editar Curso</title>
</head>

<body class="h-screen" style="background-color: #6BBEE3;">
    <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('../resources/background.jpg');">

        <?php

        session_start();
        require("connection.php");
        echo "<div class=\"mb-16\">";
        require("menu.php");
        echo "</div>";

        $course_id = $_GET["courseid"];

        $course = $database->select("courses", "*", [
            "idcourses" => $course_id
        ]);

        $course_name = $course[0]["course_name"];
        $center = $course[0]["center"];
        $date_start = $course[0]["year_start"];
        $date_end = $course[0]["year_end"];
        $description = $course[0]["description"];



        ?>

        <form class="flex items-center justify-center" method="POST" action="../actions/edit_course.php">
            <div class="w-full md:max-w-md mt-6">

                <div class="flex flex-col p-5 bg-white shadow-2xl md:rounded-xl">

                    <h2 class="text-xl text-center font-semibold text-gray-700 mb-2">
                        Editar curso
                    </h2>
                    <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id ?>">

                        <label class="mx-2 text-gray-700" for="course_name">Nombre del curso</label>
                        <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="course_name" value="<?php echo $course_name ?>" name="course_name" required>

                        <label class="mx-2 text-gray-700" for="description">Descripción</label>
                        <textarea class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="description" placeholder="<?php echo $description ?>" name="description" required></textarea>

                        <label class="mx-2 text-gray-700" for="center">Centro</label>
                        <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="center" value="<?php echo $center ?>" name="center" required>

                        <label class="mx-2 text-gray-700" for="date_start">Fecha de inicio</label>
                        <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="date" id="date_start" value="<?php echo explode(" ", $date_start)[0] ?>" name="date_start" required>

                        <label class="mx-2 text-gray-700" for="date_end">Fecha final</label>
                        <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="date" id="date_end" value="<?php echo explode(" ", $date_end)[0] ?>" name="date_end" required>

                    <div class="flex justify-center items-center">
                        <button class="bg-yellow-400 hover:bg-yellow-300 m-2 p-2 rounded text-gray-700" type="submit">Editar curso</button>
                    </div>
                </div>
            </div>
        </form>
    </header>
</body>

</html>