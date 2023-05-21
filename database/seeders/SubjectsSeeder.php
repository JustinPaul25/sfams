<?php

namespace Database\Seeders;

use App\Models\GradeLevelSubject;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/subjects.json");
        $subjects = json_decode($json);

        foreach($subjects as $subject) {
            foreach($subject->name as $name) {
                $has_subject = Subject::where('name', $name)->where('branch_id', $subject->branch_id)->first();
                if($has_subject) {
                    GradeLevelSubject::create([
                        'branch_id' => $subject->branch_id,
                        'subject_id' => $has_subject->id,
                        'grade_level_id' => $subject->grade_level_id,
                    ]);
                } else {
                    $current_subject = Subject::create([
                        'branch_id' => $subject->branch_id,
                        'name' => $name,
                    ]);

                    GradeLevelSubject::create([
                        'branch_id' => $subject->branch_id,
                        'subject_id' => $current_subject->id,
                        'grade_level_id' => $subject->grade_level_id,
                    ]);
                }
            }
        }
    }
}
