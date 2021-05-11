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

<body>
    <?php session_start();

    require("connection.php");

    $courses = $database->select("courses", "*", [
        "email" => $_SESSION["email"]
    ])

    ?>
    <form method="POST" action="../actions/add_subject.php">
        <div class="flex flex-col justify-center items-center p-5">

            <div class="flex flex-col">
                <label for="subject_name">Asignatura</label>
                <input type="text" id="subject_name" name="subject_name" required>
            </div>
            
            <div class="flex flex-col">
                <label for="teacher">Profesor</label>
                <input type="text" id="teacher" name="teacher" required>
            </div>
    
            <div class="flex flex-col">
                <label for="n_hours">Número de horas</label>
                <input type="text" id="n_hours" name="n_hours" required>
            </div>

            <div>
                <label for="course">Curso</label>
                <select name="course" id="course">

                <?php
                foreach($courses as $course) {
                    
                    echo '<option value="' . $course["idcourses"]. '">'. $course["course_name"] .'</option>';
                    

                }
                ?>
                </select>
            </div>



            <div>
                <button type="submit">Añadir curso</button>
            </div>
        </div>

    </form>

</body>

</html>