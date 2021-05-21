<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Editar Asignatura</title>
</head>

<body class="h-screen" style="background-color: #6BBEE3;">
    <?php
    session_start();
    require("connection.php");
    echo "<div class=\"mb-16\">";
    require("menu.php");
    echo "</div>";

    $subject_id = $_GET["subjectid"];
    $user = $_SESSION["email"];

    $subject = $database->select("subjects", "*", [
        "idsubjects" => $subject_id
    ]);

    $courses = $database->select("courses", "*", [
        "email" => $user
    ]);
    $name = $subject[0]["subject_name"];
    $n_hours = $subject[0]["n_hours"];
    $teacher = $subject[0]["teacher"];
    $course_id = $subject[0]["course_id"];

    ?>
    <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('../resources/background.jpg');">

        <form class="flex items-center justify-center" action="../actions/edit_subject.php" method="POST">

            <div class="w-full md:max-w-md mt-6">

                <div class="flex flex-col justify-center items-center p-5 bg-white shadow-2xl md:rounded-xl">
                    <h2 class="text-xl text-center font-semibold text-gray-700 mb-2">
                        Editar asignatura
                    </h2>

                    <div class="flex flex-col">
                        <label for="subject_name">Asignatura</label>
                        <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="subject_name" name="subject_name" value="<?php echo $name;?>" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="teacher">Profesor</label>
                        <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="teacher" name="teacher" value="<?php echo $teacher ?>" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="n_hours">Número de horas</label>
                        <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="n_hours" name="n_hours" value="<?php echo $n_hours ?>" required>
                    </div>

                    <div>
                        <label for="course">Curso</label>
                        <select class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" name="course" id="course">

                            <?php
                            foreach ($courses as $course) {

                                if ($course["idcourses"] == $course_id) {

                                    echo '<option selected="selected" value="' . $course["idcourses"] . '">' . $course["course_name"] . '</option>';
                                } else {

                                    echo '<option value="' . $course["idcourses"] . '">' . $course["course_name"] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <button class="bg-yellow-400 hover:bg-yellow-300 m-2 p-2 rounded text-gray-700"  type="submit">Editar asignatura</button>
                    </div>
                </div>
        </form>
    </header>
</body>

</html>