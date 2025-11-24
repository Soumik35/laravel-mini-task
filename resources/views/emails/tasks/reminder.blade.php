<!DOCTYPE html>
<html>
<body>
    <h2>Task Due Tomorrow</h2>
    <p>Hello,</p>

    <p>This is a reminder that your task <strong>{{ $task->title }}</strong> is due tomorrow.</p>

    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Due Date:</strong> {{ $task->due_date }}</p>

    <br>
    <p>— Task Manager System</p>
</body>
</html>
