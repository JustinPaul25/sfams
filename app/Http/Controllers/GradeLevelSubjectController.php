<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\GradeLevelSubject;

class GradeLevelSubjectController extends Controller
{
    public function subjects(GradeLevel $gradeLevel)
    {
        $user = auth()->user();

        $subjects = GradeLevelSubject::where('branch_id', $user->branch->id)->where('grade_level_id', $gradeLevel->id)->get();

        return $subjects;
    }

    public function store(Request $request, GradeLevel $gradeLevel)
    {
        $user = auth()->user();
        $branch_id = $user->branch->id;
        $request->validate([
           'subject_id' => [
			'required',
            Rule::unique('grade_level_subjects')
                ->where(function ($query) use ($branch_id, $gradeLevel){
                    return $query->where('branch_id', $branch_id)->where('grade_level_id', $gradeLevel->id);
                })
            ]
        ]);

        return GradeLevelSubject::create([
            'branch_id' => $branch_id,
            'subject_id' => $request->input('subject_id'),
            'grade_level_id' => $gradeLevel->id,
        ]);
    }

    public function destroy(GradeLevelSubject $gradeLevelSubject)
    {
        return $gradeLevelSubject->delete();
    }
}
