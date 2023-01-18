<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function update(Student $student, Request $request)
    {
        $sy = SchoolYear::where('status', 'active')->first();

        $grade = Grade::where('student_id', $student->id)->where('school_year_id', $sy->id)->first();
        $grades = $request->input('grades');

        $grade->update([
            'grade' => $grades
        ]);

        return 'Updated Successfully';
    }
}
