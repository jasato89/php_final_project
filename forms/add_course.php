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
    <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('../resources/background.jpg');">

        <?php session_start();
        echo "<div class=\"mb-16\">";
        require("menu.php");
        echo "</div>";
        ?>
        <form class="flex items-center justify-center" method="POST" action="../actions/add_course.php">
            <div class="w-full md:max-w-md mt-6">

                <div class="flex flex-col p-5 bg-white shadow-2xl md:rounded-xl">
                    <h2 class="text-xl text-center font-semibold text-gray-700 mb-2">
                        Nuevo curso
                    </h2>

                        <input placeholder="Nombre del curso" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="course_name" name="course_name" required>

                        <textarea placeholder="Descripción" class="resize-y rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="description" name="description" required></textarea>

                        <input placeholder="Centro" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="text" id="center" name="center" required>

                        <label class="mx-2 text-gray-700" for="date_end">Fecha final</label>
                        <input placeholder="Fecha de inicio" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="date" id="date_start" name="date_start" required>

                        <label class="mx-2 text-gray-700" for="date_end">Fecha final</label>
                        <input placeholder="Fecha fin" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" type="date" id="date_end" name="date_end" required>

                    <div class="flex items-center justify-center">
                        <button class="bg-yellow-400 hover:bg-yellow-300 m-2 p-2 rounded text-gray-700" type="submit">Añadir curso</button>
                    </div>
                </div>
            </div>
        </form>
    </header>
</body>

</html>