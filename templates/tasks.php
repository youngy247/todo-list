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
        echo '<li>' . $task->getName() . ' - ' . $task->getStatus() . '</li>';
    }
    ?>
</ul>
</body>
</html>