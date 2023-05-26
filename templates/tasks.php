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

    <label for="status">Status</label>
    <select id="status" name="status">
        <option value="0">Incomplete</option>
        <option value="1">Complete</option>
    </select>

    <button type="submit">Submit</button>
</form>
<ul>
    <?php
    foreach ($tasks as $task) {
        if ($task->getStatus() === 0) {
            echo '<li>' . $task->getName();
        }
    }
    ?>
</ul>
</body>
</html>
