<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
</head>
<body>
<h1>The Tasks to do</h1>

<form action="/tasks" method="post">
    <label for="name">Task name</label>
    <input id="name" name="name" />

    <input type="hidden" id="status" name="status" value="0">

    <button type="submit">Submit</button>
</form>

<ul>
    <?php
    foreach ($tasks as $task) {
        if ($task->getStatus() === 0) {
            echo '<li>' . $task->getName() . '</li>';
        }
    }
    ?>
</ul>
</body>
</html>
