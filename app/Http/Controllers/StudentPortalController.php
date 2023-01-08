<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentPortalController extends Controller
{
    public function profile()
    {
        return view('portal.student.profile', ['student' => auth()->user()->student]);
    }

    public function account()
    {
        $student = auth()->user()->student;

        return view('portal.student.account', ['account' => $student->account, 'student' => $student]);
    }

    public function notifications()
    {
        return view('portal.student.notifications');
    }
}
