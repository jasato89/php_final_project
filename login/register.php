<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Task Panel - Register</title>
</head>
<?php
require("connection.php");
$error = $_GET["error"];
if ($error == "wrong_credentials") {
?>
    <script>
        alert("No se ha podido crear el usuario");
    </script>
<?php
}
?>

<body>
    <header class=" bg-cover border-t-2 border-blue-600 h-screen" style="background-image: url('../resources/background.jpg');">
        <div class="content px-8 py-2">
            <nav class="flex items-center justify-between">
                <h2 class="text-gray-700 font-bold text-3xl ">Tasks</h2>
            </nav>
            <div class="body mt-24 mx-8">
                <div class="md:flex items-center justify-between">
                    <div class="w-full md:w-1/2 mr-auto" style="text-shadow: 0 20px 50px hsla(5,10%,0%,8);">
                        <h1 class="text-4xl font-bold text-white tracking-wide">Tasks</h1>
                        <h2 class=" text-2xl font-bold text-white tracking-wide">Bienvenido a<span class="text-gray-700"> Tasks</span></h2>
                        <p class="text-gray-700">
                            Tasks es tu herramienta para controlar todas las tareas de tus cursos
                        </p>
                    </div>
                    <div class="w-full md:max-w-md mt-6">
                        <div class="card bg-white shadow-md rounded-lg px-4 py-4 mb-6 ">
                            <form method="POST" action="validate-register.php">

                                <h2 class="text-xl text-center font-semibold text-gray-700 mb-2">
                                    Regístrate
                                </h2>
                                <input name="email" pattern="[^[^@]+@[^@]+\.[^@]+$]+" required type="text" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-6 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" placeholder="Correo">
                                <input type="password" name="password" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-4 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none" placeholder="Contraseña">
                                <div class="flex items-center justify-center">
                                    <button class="bg-yellow-400 text-gray-700 hover:bg-yellow-300  px-2 py-1 rounded">Sign In</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>

</body>

</html>