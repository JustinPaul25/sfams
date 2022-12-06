<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function update(Student $student, Request $request)
    {
        $grades = $request->input('grades');

        foreach($grades as $grade) {
            $toUpdate = Grade::find($grade['id']);
            $toUpdate->update([
                'average' => $grade['average'],
            ]);
        }

        return 'Updated Successfully';
    }
}
