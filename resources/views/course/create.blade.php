
<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>
<body>

    <h1>Add New Course</h1>

    <form action="/courses" method="POST">
        @csrf

        <label>Course Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br><br>

        <label>Duration:</label><br>
        <input type="text" name="duration" required><br><br>

        <label>Fee:</label><br>
        <input type="number" name="fee" step="0.01" min="0" required><br><br>

        <label>Difficulty:</label><br>
        <select name="difficulty" required>
            <option value="Easy">Easy</option>
            <option value="Medium">Medium</option>
            <option value="Hard">Hard</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="is_active" required>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select><br><br>

        <button type="submit">Save Course</button>
    </form>

    <br>
    <a href="/courses">Back to Course List</a>

</body>
</html>
