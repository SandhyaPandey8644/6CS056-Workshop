<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function rules()
    {
        return [
            'name' => 'required',
            'description' => 'nullable',
            'duration' => 'required',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'is_active' => 'required|boolean',
        ];
    }

    public function index()
    {
        $courses = Course::all();
        return view('course.list', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course added successfully!');
    }

    public function show(Course $course)
    {
        return view('course.detail', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate($this->rules());

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}
