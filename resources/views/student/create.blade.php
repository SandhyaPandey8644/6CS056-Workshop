<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

    <h1>Register New Student</h1>

    <form action="/students" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone" required>
        <br><br>

        <label>Address:</label>
        <textarea name="address"></textarea>
        <br><br>

        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth">
        <br><br>

        <button type="submit">Save Student</button>
    </form>

    <br>
    <a href="/students">Back to Student List</a>

</body>
</html>