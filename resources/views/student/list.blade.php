
@extends('layouts.app')

@section('title', 'Student List')

@section('content')

    <h1>Student List</h1>

    <a href="{{ route('students.create') }}">Add New Student</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>

                    <td>
                        <a href="{{ route('students.show', $student->id) }}">View</a> |
                        <a href="{{ route('students.edit', $student->id) }}">Edit</a>

                        @include('components.delete-form', [
                            'action' => route('students.destroy', $student->id)
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

