<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class NewStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/student.json");
        $students = json_decode($json);

        foreach ($students as $student) {

            if($student->grade_enter_id < 3) {
                $department = 'KINDER';
            }

            if($student->grade_enter_id > 2 && $student->grade_enter_id < 11) {
                $department = 'ELEM';
            }

            if($student->grade_enter_id > 9 && $student->grade_enter_id < 15) {
                $department = 'SRH';
            }

            $student = Student::create([
                'lrn' => $student->lrn,
                'email' => $student->email,
                'branch_id' => $student->branch_id,
                'department' => $department,
                'status' => 'PENDING',
                'first_name' => ucwords($student->first_name),
                'last_name' => ucwords($student->last_name),
                'middle_name' => ucwords($student->middle_name),
                'birth_date' => $student->birth_date,
                'birth_place' => $student->birth_place,
                'grade_entered_id' => $student->grade_enter_id,
                'grade_level_id' => $student->grade_enter_id,
                'gender' => $student->gender,
                'phone' => $student->phone,
                'father_name' => $student->father_name,
                'father_is_deceased' => false,
                'father_phone' => $student->father_phone,
                'mother_name' => $student->mother_name,
                'mother_is_deceased' => false,
                'mother_phone' => $student->mother_phone,
                'guardian_name' => 'N/A',
                'guardian_phone' => 'N/A',
                'purok_street' => $student->purok_street,
                'barangay' => $student->barangay,
                'city' => $student->city,
                'province' => $student->province,
                'contact_person' => ucwords($student->contact_person),
                'contact_person_number' => $student->contact_person_number,
                'last_school_attended' => $student->last_school_attended,
                'last_school_address' => $student->last_school_address,
                'last_school_grade_section' => $student->last_school_grade_section,
                'last_school_school_year' => $student->last_school_school_year,
            ]);
        }
    }
}
