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

<body>
    <?php
    session_start();
    require("connection.php");

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

    <form action="../actions/edit_subject.php" method="POST">
        <div class="flex flex-col">
            <label for="subject_name">Asignatura</label>
            <input type="text" id="subject_name" name="subject_name" value="<?php echo $name ?>" required>
        </div>

        <div class="flex flex-col">
            <label for="teacher">Profesor</label>
            <input type="text" id="teacher" name="teacher" value="<?php echo $teacher ?>" required>
        </div>

        <div class="flex flex-col">
            <label for="n_hours">Número de horas</label>
            <input type="text" id="n_hours" name="n_hours" <?php echo $n_hours ?> required>
        </div>

        <div>
            <label for="course">Curso</label>
            <select name="course" id="course">

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
            <button type="submit">Editar asignatura</button>
        </div>
        </div>

    </form>
</body>

</html>