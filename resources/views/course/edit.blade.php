
<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

    <h1>Edit Course</h1>

    <form action="/courses/{{ $course->id }}" method="POST">
        @csrf
        @method('PUT')

        <label>Course Name:</label><br>
        <input type="text" name="name" value="{{ $course->name }}" required><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ $course->description }}</textarea><br><br>

        <label>Duration:</label><br>
        <input type="text" name="duration" value="{{ $course->duration }}" required><br><br>

        <label>Fee:</label><br>
        <input type="number" name="fee" step="0.01" min="0" value="{{ $course->fee }}" required><br><br>

        <label>Difficulty:</label><br>
        <select name="difficulty" required>
            <option value="Easy" {{ $course->difficulty == 'Easy' ? 'selected' : '' }}>Easy</option>
            <option value="Medium" {{ $course->difficulty == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="Hard" {{ $course->difficulty == 'Hard' ? 'selected' : '' }}>Hard</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="is_active" required>
            <option value="1" {{ $course->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$course->is_active ? 'selected' : '' }}>Inactive</option>
        </select><br><br>

        <button type="submit">Update Course</button>
    </form>

    <br>
    <a href="/courses">Back to Course List</a>

</body>
</html>
