<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
</head>
<body>
<h1>The Completed Tasks</h1>

<ul>
    <?php foreach ($tasks as $task): ?>
        <?php if ($task->getStatus() === 1): ?>
            <li><?php echo $task->getName(); ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<a href="/tasks">See the to do tasks</a>
</body>
</html>
