<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Tarea</title>
</head>

<body>

    <?php
    require("connection.php");
    $email = $_SESSION["email"];
    $subjects = $database->select("subjects", "*", [
        "email" => $email
    ]);

    ?>

    <form action="actions/add_task.php" method="POST">

        <label for="task_name">Tarea</label>
        <input type="text" name="task_name" id="task_name">

        <label for="subject"></label>
        <select name="subject" id="subject">

            <?php
                foreach($subjects as $subject) {
                    echo '<option value="' . $subject["idsubjects"]. '">'. $subject["subject_name"] .'</option>';
                }
            ?>

        </select>

        <label for="date_start">Fecha de inicio</label>
        <input type="date" name="date_start" id="date_start">

        <label for="date_end">Fecha de finalización</label>
        <input type="date" name="date_end" id="date_end">

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="hold">En espera</option>
            <option value="started">Iniciada</option>
            <option value="finished">Finalizada</option>
        </select>

        <label for="description"></label>
        <input type="text" name="description" id="description">

        <button type="submit">Añadir tarea</button>

    </form>

</body>

</html>