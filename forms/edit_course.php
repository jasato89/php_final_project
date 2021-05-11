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

<body>
    <?php 
    
    session_start();
    require("connection.php");

    $course_id = $_GET["courseid"];

    $course = $database -> select("courses", "*", [
        "idcourses" => $course_id
    ]);

    $course_name = $course[0]["course_name"];
    $center = $course[0]["center"];
    $date_start = $course[0]["year_start"];
    $date_end = $course[0]["year_end"];
    $description = $course[0]["description"];


    
    ?>
    <form method="POST" action="../actions/edit_course.php">
        <div class="flex flex-col justify-center items-center p-5">

        <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id?>">

                <div class="flex flex-col">
                    <label for="course_name">Nombre del curso</label>
                    <input type="text" id="course_name" value="<?php echo $course_name?>" name="course_name" required>
                </div>

                <div class="flex flex-col">
                    <label for="description">Descripción</label>
                    <input type="text" id="description" value="<?php echo $description?>" name="description" required>
                </div>

                <div class="flex flex-col">
                    <label for="center">Centro</label>
                    <input type="text" id="center"  value="<?php echo $center?>" name="center" required>
                </div>

                <div class="flex flex-col">
                    <label for="date_start">Fecha de inicio</label>
                    <input type="date" id="date_start" value="<?php echo explode(" ",$date_start)[0]?>" name="date_start" required>
                </div>

                <div class="flex flex-col">
                    <label for="date_end">Fecha final</label>
                    <input type="date" id="date_end" value="<?php echo explode(" ",$date_end)[0]?>" name="date_end" required>
                </div>

            <div>
                <button type="submit">Editar curso</button>
            </div>
        </div>

    </form>

</body>

</html>