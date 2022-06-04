<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function create()
    {
        $levels = GradeLevel::all();

        return view('students.form', ['levels' => $levels]);
    }
}
