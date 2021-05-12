<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>

<body>

    <?php
    require("connection.php");
    $email = $_SESSION["email"];
    $task_id = $_GET["task_id"];

    $task = $database->select("tasks", "*", [
        "idtasks" => $task_id
    ]);

    $task_name = $task[0]["task_name"];
    $subject_id = $task[0]["subject"];
    $date_start = $task[0]["date_start"];
    $date_end = $task[0]["date_end"];
    $status = $task[0]["status"];
    $description = $task[0]["description"];


    ?>

    <form action="actions/add_task.php" method="POST">

        <label for="task_name">Tarea</label>
        <input type="text" name="task_name" value="<?php echo $task_name; ?>" id="task_name">

        <label for="subject"></label>
        <select name="subject" id="subject">

            <?php
            foreach ($subjects as $subject) {
                if ($subject["idsubjects"] == $subject_id) {

                    echo '<option selected="selected" value="' . $subject["idsubjects"] . '">' . $subject["subject_name"] . '</option>';
                
                } else {

                    echo '<option value="' . $subject["idsubjects"] . '">' . $subject["subject_name"] . '</option>';
                }
            }
            ?>

        </select>

        <label for="date_start">Fecha de inicio</label>
        <input type="date" name="date_start" value="<?php echo $date_start; ?>" id="date_start">

        <label for="date_end">Fecha de finalización</label>
        <input type="date" name="date_end" value="<?php echo $date_end; ?>" id="date_end">

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="hold" <?php if ($status == "hold") echo 'selected="selected"' ?>>En espera</option>
            <option value="started" <?php if ($status == "started") echo 'selected="selected"' ?>>Iniciada</option>
            <option value="finished" <?php if ($status == "finished") echo 'selected="selected"' ?>>Finalizada</option>
        </select>

        <label for="description"></label>
        <input type="text" name="description" value="<?php echo $description; ?>" id="description">

        <button type="submit">Editar tarea</button>

    </form>

</body>

</html>