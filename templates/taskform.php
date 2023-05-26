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
    <select id="status" name="status">
        <option value="0">Incomplete</option>
        <option value="1">Complete</option>
    </select>

    <button type="submit">Submit</button>
</form>

<a href="/tasks">Back to tasks</a>

</body>
</html>
