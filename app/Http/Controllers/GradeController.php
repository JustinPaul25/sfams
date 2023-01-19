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

        $student_grade = Grade::where('student_id', $student->id)->where('school_year_id', $sy->id)->first();
        $grades = $request->input('grades');
        $total = 0;

        foreach($grades as $grade) {
            $total = $total + $grade['value'];
        }

        $average = $total/count($grades);

        $student_grade->update([
            'grade' => $grades,
            'average' => $average,
        ]);

        return 'Updated Successfully';
    }
}
