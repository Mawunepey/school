<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegistered;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request) 
    {
        $student = Student::create($request->only(['name', 'email', 'class']));

        // Handle file upload (optional)
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            Upload::create([
                'filename' => $filename,
                'type' => $file->getClientMimeType(),
                'student_id' => $student->id,
                
            ]);
            if ($request->hasFile('file')) {
    $file = $request->file('file');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->storeAs('uploads', $filename, 'public');

    $model->uploads()->create([
        'filename' => $filename,
        'type' => $file->getClientMimeType(),
    ]);
            }
        }

        // Send email notification
        Mail::to($student->email)->send(new StudentRegistered($student));

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->only(['name', 'email', 'class']));

        if ($request->hasFile('file')) {
            // Delete old file if any
            $oldUpload = $student->upload;
            if ($oldUpload && Storage::disk('public')->exists('uploads/' . $oldUpload->filename)) {
                Storage::disk('public')->delete('uploads/' . $oldUpload->filename);
                $oldUpload->delete();
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            Upload::create([
                'filename' => $filename,
                'type' => $file->getClientMimeType(),
                'student_id' => $student->id,
            ]);
        }

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        // Delete associated file
        $upload = $student->upload;
        if ($upload && Storage::disk('public')->exists('uploads/' . $upload->filename)) {
            Storage::disk('public')->delete('uploads/' . $upload->filename);
            $upload->delete();
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
