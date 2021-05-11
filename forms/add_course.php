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
    <?php session_start() ?>
    <form method="POST" action="../actions/add_course.php">
        <div class="flex flex-col justify-center items-center p-5">

                <div class="flex flex-col">
                    <label for="course_name">Nombre del curso</label>
                    <input type="text" id="course_name" name="course_name" required>
                </div>

                <div class="flex flex-col">
                    <label for="description">Descripción</label>
                    <input type="text" id="description" name="description" required>
                </div>

                <div class="flex flex-col">
                    <label for="center">Centro</label>
                    <input type="text" id="center" name="center" required>
                </div>

                <div class="flex flex-col">
                    <label for="date_start">Fecha de inicio</label>
                    <input type="date" id="date_start" name="date_start" required>
                </div>

                <div class="flex flex-col">
                    <label for="date_end">Fecha final</label>
                    <input type="date" id="date_end" name="date_end" required>
                </div>

            <div>
                <button type="submit">Añadir curso</button>
            </div>
        </div>

    </form>

</body>

</html>