
<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
</head>
<body>

    <h1>Course List</h1>

    <a href="/courses/create">Add New Course</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Duration</th>
            <th>Fee</th>
            <th>Difficulty</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->duration }}</td>
            <td>{{ $course->fee }}</td>
            <td>{{ $course->difficulty }}</td>
            <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>

            <td>
                <a href="/courses/{{ $course->id }}">View</a> |
                <a href="/courses/{{ $course->id }}/edit">Edit</a> |

                <form action="/courses/{{ $course->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</body>
</html>
