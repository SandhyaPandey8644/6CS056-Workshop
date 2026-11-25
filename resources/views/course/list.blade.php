@extends('layouts.app')

@section('title', 'Course List')

@section('content')

    <h1>Course List</h1>

    <a href="{{ route('courses.create') }}">Add New Course</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>

                    <td>
                        <a href="{{ route('courses.show', $course->id) }}">View</a> |
                        <a href="{{ route('courses.edit', $course->id) }}">Edit</a>

                        @include('components.delete-form', [
                            'action' => route('courses.destroy', $course->id)
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
