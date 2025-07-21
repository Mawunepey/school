<?php
namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalTeachers' => Teacher::count(),
            'totalStudents' => Student::count(),
        ]);
    }
}
