<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Asignaturas</title>
</head>

<body>
    <?php
    include "connection.php";
    include "menu.php";
    session_start();

    if (isset($_SESSION["email"])) {
        $course_code = $_GET["course"];


        if ($course_code != null) {
            echo "<h1  class=\"pt-12 mt-12\">" . $course_code . "</h1";
            $subjects = $database->select("subjects", "*", [
                "course_id" => $course_code
            ]);

            foreach($subjects as $subject) {
                echo "<h1>" . $subject["subject_name"] . "<h1>";
            }

        } else {
            $subjects = $database->select("subjects", "*",[
                "email" => $_SESSION["email"]
            ]);
            echo "<h1  class=\"pt-12 mt-12\">" . "No hay ningún curso" . "</h1";
    
            foreach($subjects as $subject) {
                echo "<h1>" . $subject["subject_name"] . "<h1>";
            }   
        }
    }
    ?>

</body>

</html>