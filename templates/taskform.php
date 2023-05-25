<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
</head>
<body>

<form action="/tasks" method="post">
    <label for="name">Task name</label>
    <input id="name" name="name" />
    <label for="status">Status</label>
    <input id="status" name="status" />
    <button>Submit</button>
</form>

<a href="/tasks">Back to tasks</a>

</body>
</html>
