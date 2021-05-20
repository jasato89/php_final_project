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
        echo "<div class=\"mb-16\">";
        require("menu.php");
        echo "</div>";

        $user = $_SESSION["email"];

        $courses = $database->select("courses", "*", [
            "email" => $user
        ]);
        if ($courses) {
    ?>

            <div class="p-10 bg-yellow-400 rounded flex flex-col items-center justify-center">
                    <h1 class="inline-block text-center bg-white m-2 p-2 text-2xl text-gray-600">Bienvenido <?php echo $user?></h1>
                    <h2 class="inline-block bg-white m-2 p-2 text-xl text-gray-600">Estos son tus cursos</h2>
            </div>

            <div class="my-4 mx-2 flex flex-1 flex-wrap justify-center">
                <?php foreach ($courses as $course) {
                ?>
                    <div>
                        <div class="grid grid-cols-1 p-2 border-8 shadow-xl border-black m-2 text-gray-700 bg-yellow-300">
                            <p class="px-2 py-2 font-semibold text-center text-xl"><?php echo $course["course_name"] ?></p>

                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <h2 class="font-semibold text-sm px-2 py-2">Descripcion</h2>
                                <p class="px-2 py-2"><?php echo $course["description"] ?></p>
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

            <!--  <table class="mx-auto max-w-4xl w-full whitespace-wrap rounded-lg bg-white divide-y divide-gray-300 overflow-x-scroll">
                <thead class="bg-gray-50">
                    <tr class="text-gray-600 text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4">Nombre Curso</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4\">Descripción</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Fecha Inicio</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Fecha Fin</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Acciones</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">Ver Asignaturas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    foreach ($courses as $course) {
                    ?>
                        <tr>
                            <td class="px-6 py-4 text-center font-semibold text-blue-900"><?php echo $course["course_name"]; ?></td>
                            <td>
                                <div class="text-center h-2 py-12 px-6 overflow-y-scroll"> <?php echo $course["description"] ?></div>
                            </td>
                            <td class="px-6 py-4 text-center"> <?php echo $course["year_start"]; ?></td>
                            <td class="px-6 py-4 text-center"> <?php echo $course["year_end"] ?></td>
                            <td class="px-6 py-4 text-center">
                                <a href=\forms/edit_course.php?courseid="<?php echo $course["idcourses"]; ?>">
                                    <i class="material-icons-outlined">edit</i></a>
                                <a href="actions/delete_course.php?courseid=<?php $course["idcourses"]; ?>"><i class="material-icons-outlined">delete</i></a>
                            </td>
                            <td class="px-6 py-4 text-center"><a class="text-purple-800 hover:underline" href="subjects.php?course=<?php echo $course["idcourses"]; ?>"> Ver asignaturas</a></td>
                        <?php
                    }
                        ?>
                </tbody>
            </table> -->
    <?php
        } else {
            require("forms/add_course.php");
        }
    } else {
        header("Location: login/login.php");
    }
    ?>

    <div class="flex justify-center">
        <a class="bg-green-300 p-2 m-2 rounded hover:bg-green-400 text-gray-600" href="forms/add_course.php">Añadir Curso</a>
    </div>



</body>

</html>