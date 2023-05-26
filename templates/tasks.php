<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
</head>
<body>
<h1>The Tasks to do</h1>
<ul>
    <?php
    foreach ($tasks as $task) {
        if ($task->getStatus() === 0) {
            echo '<li>' . $task->getName();
        }
    }
    ?>
</ul>
<a href="/addtask">Add a task</a>
</body>
</html>
