<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'code' => 'required|string|unique:courses,code',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course created.');
    }

    public function edit(Course $course)
    {
        $teachers = Teacher::all();
        return view('courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'code' => 'required|string|unique:courses,code,' . $course->id,
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
}
