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

<body class="h-screen" style="background-color: #6BBEE3;">
    <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('resources/background.jpg');">

        <?php
        session_start();
        require("connection.php");
        if (isset($_SESSION["email"])) {
            echo "<div class=\"mb-16\">";
            require("menu.php");
            echo "</div>";

            $user = $_SESSION["email"];

            $courses = $database->select("courses", "*", [
                "email" => $user
            ]);
            if ($courses) {
        ?>

                <div class="p-10 rounded flex flex-col items-center justify-center">
                    <h1 class="inline-block text-center bg-white m-2 p-2 text-2xl text-gray-600">Bienvenido <?php echo $user ?></h1>
                    <h2 class="inline-block bg-white m-2 p-2 text-xl text-gray-600">Estos son tus cursos</h2>
                </div>

                <div class="my-4 mx-2 sm:flex sm:flex-1 sm:flex-wrap sm:justify-center ">
                    <?php foreach ($courses as $course) {
                    ?>
                        <div class="p-2">
                            <div class="p-2 border-8 shadow-xl border-black m-2 text-gray-700 bg-yellow-300 sm:h-full sm:w-96">
                                <p class="px-2 py-2 font-semibold text-center text-xl"><?php echo $course["course_name"] ?></p>

                                <div class="grid grid-cols-1 sm:grid-cols-3">
                                    <h2 class="font-semibold text-sm px-2 py-2">Descripcion</h2>
                                    <p class="px-2 py-2 max-w-sm text-gray-700 col-span-3"><?php echo $course["description"] ?></p>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <h2 class="font-semibold text-sm  px-2 py-2">Fecha de inicio</h2>
                                    <p class="px-2 py-2 "><?php echo explode(" ", $course["year_start"])[0]; ?></p>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <h2 class="font-semibold text-sm  px-2 py-2">Fecha fin</h2>
                                    <p class="px-2 py-2 "><?php echo explode(" ", $course["year_end"])[0]; ?></p>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <h2 class="font-semibold text-sm px-2 py-2">Acciones</h2>
                                    <div class="flex flex-row px-2 py-2">
                                        <a href=forms/edit_course.php?courseid=<?php echo $course["idcourses"]; ?>">
                                            <i class="material-icons-outlined">edit</i></a>
                                        <a href="actions/delete_course.php?courseid=<?php echo $course["idcourses"]; ?>">
                                            <i class="material-icons-outlined">delete</i></a>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2">
                                    <h2 class="font-semibold text-sm px-2 py-2">Asignaturas</h2>
                                    <div class="flex flex-row">
                                        <a class="text-purple-600 hover:underline px-2 py-2 font-semibold text-blue-900" href="subjects.php?course=<?php echo $course["idcourses"]; ?>"> Ver asignaturas</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>


        <?php
            } else {
                require("forms/add_course.php");
            }
        } else {
            header("Location: login/login.php");
        }
        ?>

        <div class="fixed bottom-4 right-4 transform hover:scale-125">
            <a href="forms/add_course.php" class="font-bold text-gray-700 shadow-xl bg-yellow-400 border-2 border-gray-700 rounded-full bg-white flex items-center justify-center font-mono h-16 w-16">
                <div class="material-icons-outlined">
                    add
                </div>
            </a>
        </div>

    </header>
</body>

</html>