<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Student;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list()
    {
        $students = Student::with(['branch', 'gradeLevel'])->get();

        return response()->json($students);
    }

    public function index()
    {
        return view('students.index');
    }

    public function create()
    {
        $levels = GradeLevel::all();
        $branches = Branch::all();

        return view('students.form', ['levels' => $levels, 'branches' => $branches]);
    }

    public function show(Student $student)
    {
        $student = Student::where('id', $student->id)->with(['branch', 'gradeLevel'])->first();
        return view('students.view', ['student' => $student]);
    }

    public function studentProfile()
    {
        $student = Student::where('id', auth()->user()->student_id)->with(['branch', 'gradeLevel'])->first();
        return view('students.profile', ['student' => $student]);
    }
}
