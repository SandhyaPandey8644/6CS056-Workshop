<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
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
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'duration' => 'required',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'is_active' => 'required|boolean',
        ]);

        Course::create($validated);

        return redirect('/courses')->with('success', 'Course added successfully!');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('course.detail', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'duration' => 'required',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'is_active' => 'required|boolean',
        ]);

        $course->update($validated);

        return redirect('/courses')->with('success', 'Course updated successfully!');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }
}
