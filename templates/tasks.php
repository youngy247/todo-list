<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
</head>
<body>
<h1>The Tasks</h1>
<ul>
    <?php
    foreach ($tasks as $task) {
        $status = $task->getStatus() === 0 ? 'Incomplete' : 'Complete';
        echo '<li>' . $task->getName() . ' - ' . $status . '</li>';
    }
    ?>
</ul>
<a href="/addtask">Add a task</a>
</body>
</html>