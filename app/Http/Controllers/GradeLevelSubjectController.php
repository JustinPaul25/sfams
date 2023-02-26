<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\GradeLevel;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\GradeLevelSubject;
use App\Models\Subject;

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

        $sy = SchoolYear::where('status', 'active')->first();

        $grades = Grade::where('grade_level_id', $gradeLevel->id)->where('school_year_id', $sy->id)->get();

        $selected = Subject::find($request->input('subject_id'));

        foreach($grades as $grade) {
            $subject = $grade->grade;
            $subject[] = [
                'label' => $selected->name,
                'value' => [
                    [
                        'label' => 'first',
                        'value' => 0
                    ],
                    [
                        'label' => 'second',
                        'value' => 0
                    ],
                    [
                        'label' => 'third',
                        'value' => 0
                    ],
                    [
                        'label' => 'fourth',
                        'value' => 0
                    ]
                ]
            ];

            $grade->grade = $subject;

            $grade->update();
        }

        GradeLevelSubject::create([
            'branch_id' => $branch_id,
            'subject_id' => $request->input('subject_id'),
            'grade_level_id' => $gradeLevel->id,
        ]);

        return;
    }

    public function destroy(GradeLevelSubject $gradeLevelSubject)
    {
        return $gradeLevelSubject->delete();
    }
}
