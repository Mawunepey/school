<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller

{
    public function gradebook()
    {
        // $grades = Grade::with(['student', 'assignment'])->get();
        return view('teacher.gradebook', compact('grades'));
    }
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'subject' => 'required|string|max:100',
        ]);

        Teacher::create($request->only(['name', 'email', 'subject']));

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'subject' => 'required|string|max:100',
        ]);

        $teacher->update($request->only(['name', 'email', 'subject']));

        return redirect()->route('teachers.index')->with('success', 'Teacher updated.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted.');
    }
}
