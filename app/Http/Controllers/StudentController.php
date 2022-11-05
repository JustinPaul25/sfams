<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Student;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list(Request $request)
    {
        $query = Student::query();

        if($request->filled('name')) {
            $search = $request->input('name');
            $query = $query->where(function($q) use ($search){
                $q->where('first_name', 'LIKE', '%'.$search.'%')
                ->orWhere('last_name', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->filled('level')) {
            $query = $query->where('grade_level_id', $request->input('level'));
        }

        $query = $query->where(function ($query) {
            $query->where('status', '!=', 'PENDING');
        });
        
        $query = $query->with(['gradeLevel'])->get();

        return response()->json($query);
    }

    public function index()
    {
        $levels = GradeLevel::all();
        $branches = Branch::all();

        return view('students.index', ['levels' => $levels, 'branches' => $branches]);
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
