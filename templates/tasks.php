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
    <?php foreach ($tasks as $task): ?>
        <?php if ($task->getStatus() === 0): ?>
            <li>
                <?php echo $task->getName(); ?>
                <form class="status-form" action="/tasks/update-status" method="post">
                    <input type="hidden" name="task_id" value="<?php echo $task->getId(); ?>">
                    <button type="submit" id="status" name="status" value="1">Mark as Complete</button>
                </form>
                <form method="post" action="/completedtasks/delete">
                    <input type="hidden" name="task_id" value="<?php echo $task->getId(); ?>">
                    <button class="delete-button" type="submit">x</button>
                </form>
                <form method="post" action="/tasks/edit">
                    <input type="hidden" name="task_id" value="<?php echo $task->getId(); ?>">
                    <label for="new_name_<?php echo $task->getId(); ?>">New Task Name</label>
                    <input id="new_name_<?php echo $task->getId(); ?>" name="new_name_<?php echo $task->getId(); ?>" />
                    <button type="submit">Edit</button>
                </form>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<a href="/completedtasks">See the completed tasks</a>
</body>
</html>
