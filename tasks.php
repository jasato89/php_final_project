<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

</head>

<body class="h-screen" style="background-color: #6BBEE3;">
    <header class="bg-repeat bg-cover border-t-2 border-blue-600 h-full" style="background-image: url('resources/background.jpg');">


        <?php

        include "connection.php";
        session_start();

        if (isset($_SESSION["email"])) {
            echo "<div class=\"mb-16\">";
            require("menu.php");
            echo "</div>";
            $subject_id = $_GET["subject"];


            if ($subject_id != null) {

                $tasks = $database->select("tasks", "*", [
                    "subject_id" => $subject_id
                ]);

                $subject = $database->select("subjects", "*", [
                    "idsubjects" => $subject_id
                ]);

        ?>

                <div class="p-10 rounded flex flex-col items-center justify-center">
                    <h1 class="inline-block text-center bg-white m-2 p-2 text-2xl text-gray-600">Tareas de <?php echo $subject[0]["subject_name"]; ?></h1>
                </div>

            <?php

                echo '<div class="my-4 mx-2 sm:flex sm:flex-1 sm:flex-wrap sm:justify-center">';
                printTaskTable($tasks);
                echo '</div>';
            } else {

                $tasks = $database->select("tasks", "*", [
                    "email" => $_SESSION["email"]
                ]);

            ?>

                <div class="p-10 rounded flex flex-col items-center justify-center">
                    <h1 class="inline-block text-center bg-white m-2 p-2 text-2xl text-gray-600">Todas tus tareas</h1>
                </div>

            <?php

                echo '<div class="my-6 mx-2 sm:flex sm:flex-1 sm:flex-wrap sm:justify-center">';
                printTaskTable($tasks);
                echo '</div>';
            }
        } else {
            header("Location: login/login.php");
        }


        function printTaskTable($tasks)
        {

            foreach ($tasks as $task) {
            ?>
                <div class="relative border-8 shadow-xl border-black m-2 text-gray-700 bg-yellow-300">
                    <div class="w-auto grid grid-cols-1 p-2">
                        <div class="absolute top-0 right-0 flex flex-row">
                            <a href="forms/edit_task.php?taskid=<?php echo $task["idtasks"]?>">
                                <i class="bg-blue-400 hover:bg-blue-500 shadow-xl p-2 m-0 material-icons-outlined rounded-full m-2 mr-0">edit</i>
                            </a>
                            <a href="actions/delete_tasks.php?taskid=<?php echo $task["idtasks"]?>">
                                <i class="bg-red-400 hover:bg-red-500 shadow-xl p-2 m-0 material-icons-outlined rounded-full m-2">delete</i>
                            </a>
                        </div>
                        <p class="mt-8 px-2 py-2 font-semibold text-center text-xl"><?php echo $task["task_name"]; ?></p>

                        <?php

                        $showStatus = $task["status"];
                        if ($showStatus == "started") {
                            $showStatus = "Iniciada";
                        ?>
                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <div class="flex flex-col align-middle">
                                    <h2 class="my-auto font-semibold text-sm  px-2 py-2">Status</h2>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p class="px-4 py-1 bg-green-500 text-center rounded"><?php echo $showStatus; ?></p>
                                </div>
                            </div>

                        <?php
                        } elseif ($showStatus == "hold") {
                            $showStatus = "En Espera";
                        ?>
                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <div class="flex flex-col align-middle">
                                    <h2 class="my-auto font-semibold text-sm  px-2 py-2">Status</h2>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p class="px-4 py-1 bg-blue-500 text-gray-300 text-center rounded"><?php echo $showStatus; ?></p>
                                </div>
                            </div>
                        <?php
                        } else {
                            $showStatus = "Cerrada";
                        ?>
                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <div class="flex flex-col align-middle">
                                    <h2 class="my-auto font-semibold text-sm  px-2 py-2">Status</h2>
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p class="px-4 py-1 bg-red-500 text-center rounded"><?php echo $showStatus; ?></p>
                                </div>
                            </div>
                    </div>
                <?php
                        }
                ?>

                <div class="grid grid-cols-1 sm:grid-cols-2">
                    <h2 class="font-semibold text-sm px-2 py-2">Descripción</h2>
                    <p class="block w-44 px-2 py-2 "><?php echo $task["description"]; ?></p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2">
                    <h2 class="font-semibold text-sm  px-2 py-2">Fecha de inicio</h2>
                    <p class="px-2 py-2 "><?php echo explode(" ", $task["date_start"])[0]; ?></p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2">
                    <h2 class="font-semibold text-sm  px-2 py-2">Fecha de finalización</h2>
                    <p class="px-2 py-2 "><?php echo explode(" ", $task["date_end"])[0]; ?></p>
                </div>


                </div>
                </div>
        <?php
            }
        }
        ?>

        <div class="fixed bottom-4 right-4 transform hover:scale-125">
            <a href="forms/add_task.php" class="font-bold text-gray-700 shadow-xl bg-yellow-400 border-2 border-black rounded-full bg-white flex items-center justify-center font-mono h-16 w-16">
                <div class="material-icons-outlined">
                    add
                </div>
            </a>
        </div>

    </header>
</body>

</html>