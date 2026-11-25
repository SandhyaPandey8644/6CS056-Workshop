<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private function rules($id = null)
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required',
            'address' => 'nullable',
            'date_of_birth' => 'nullable|date',
        ];
    }

    public function index()
    {
        $students = Student::all();
        return view('student.list', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('student.detail', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate($this->rules($student->id));

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}

