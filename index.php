<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Panel - Welcome</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["email"])) {
        ?>
        <nav>
        <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="subjects.php">Asignaturas</a></li>
        <li><a href="tasks.php">Tareas</a></li>
        </ul>
        </nav>
    <?php
    } else {
        header("Location: login/login.php");
    }
    ?>
    <h1>It works</h1>

</body>

</html>