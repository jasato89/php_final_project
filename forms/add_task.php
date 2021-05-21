<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Añadir Tarea</title>
</head>

<body class="h-screen" style="background-color: #6BBEE3;">

    <?php
    session_start();
    require("connection.php");
    echo "<div class=\"mb-16\">";
    require("menu.php");
    echo "</div>";
    $email = $_SESSION["email"];
    $subjects = $database->select("subjects", "*", [
        "email" => $email
    ]);

    ?>
    <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('../resources/background.jpg');">

        <form class="flex items-center justify-center" action="../actions/add_task.php" method="POST">
            <div class="w-full md:max-w-md mt-6">

                <div class="flex flex-col p-5 bg-white shadow-2xl md:rounded-xl">

                    <h2 class="text-xl text-center font-semibold text-gray-700 mb-2">
                        Nueva tarea
                    </h2>
                    <input placeholder="Tarea" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" name="task_name" id="task_name">
                    <select placeholder="Asignatura" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" name="subject" id="subject">

                        <?php
                        foreach ($subjects as $subject) {
                            echo '<option value="' . $subject["idsubjects"] . '">' . $subject["subject_name"] . '</option>';
                        }
                        ?>

                    </select>

                    <label for="date_start">Fecha de inicio</label>
                    <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="date" name="date_start" id="date_start">

                    <label for="date_end">Fecha de finalización</label>
                    <input class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="date" name="date_end" id="date_end">
                    <select placeholder="Asignatura" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" name="status" id="status">
                        <option value="hold">En espera</option>
                        <option value="started">Iniciada</option>
                        <option value="finished">Finalizada</option>
                    </select>
                    <label for="description"></label>
                    <textarea placeholder="Descripción" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" name="description" id="description"></textarea>
                    <button class="bg-yellow-400 hover:bg-yellow-300 m-2 p-2 rounded text-gray-700" type="submit">Añadir tarea</button>
                </div>
            </div>
        </form>
    </header>
</body>

</html>