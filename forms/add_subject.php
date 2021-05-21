<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Añadir Curso</title>
</head>

<body class="h-screen" style="background-color: #6BBEE3;">

    <?php session_start();

    require("connection.php");
    echo "<div class=\"mb-16\">";
    require("menu.php");
    echo "</div>";

    $courses = $database->select("courses", "*", [
        "email" => $_SESSION["email"]
    ])

    ?>

        <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('../resources/background.jpg');">

            <form class="flex items-center justify-center" method="POST" action="../actions/add_subject.php">
                
                <div class="w-full md:max-w-md mt-6">

                    <div class="flex flex-col justify-center items-center p-5 bg-white shadow-2xl md:rounded-xl">
                        <h2 class="text-xl text-center font-semibold text-gray-700 mb-2">
                            Nueva asignatura
                        </h2>

                        <div class="flex flex-col">
                            <input placeholder="Asignatura" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="subject_name" name="subject_name" required>
                        </div>

                        <div class="flex flex-col">
                            <input placeholder="Profesor" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="teacher" name="teacher" required>
                        </div>

                        <div class="flex flex-col">
                            <input placeholder="Horas" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="n_hours" name="n_hours" required>
                        </div>

                        <div class="flex flex-col">
                            <select placeholder="Nombre del curso" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" name="course" id="course">

                                <?php
                                foreach ($courses as $course) {

                                    echo '<option value="' . $course["idcourses"] . '">' . $course["course_name"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>



                        <div>
                            <button class="bg-yellow-400 hover:bg-yellow-300 m-2 p-2 rounded text-gray-700" type="submit">Añadir asignatura</button>
                        </div>
                    </div>
                </div>
            </form>
        </header>
    </body>

</html>