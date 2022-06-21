<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Student;
use App\Types\RoleType;
use App\Models\GradeLevel;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EnrollmentController extends Controller
{
    public function index()
    {
        $levels = GradeLevel::all();
        $branches = Branch::all();

        return view('online-enrollment', ['levels' => $levels, 'branches' => $branches]);
    }

    public function store(Request $request)
    {
        if(auth()->user()) {
            $status = 'ACCEPTED';
        } else {
            $status = 'PENDING';
        }

        if($request->input('grade_entered_id') < 3) {
            $department = 'KINDER';
        }

        if($request->input('grade_entered_id') > 2 && $request->input('grade_entered_id') < 9) {
            $department = 'ELEM';
        }

        if($request->input('grade_entered_id') > 9 && $request->input('grade_entered_id') < 13) {
            $department = 'SRH';
        }

        $id = IdGenerator::generate(['table' => 'students', 'length' => 6, 'prefix' => date('y')]);

        $student = Student::create([
            'enrollment_id' => $id,
            'email' => $request->input('email'),
            'branch_id' => $request->input('branch_id'),
            'department' => 'SRH',
            'status' => $status,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'birth_date' => $request->input('birth_date'),
            'birth_place' => $request->input('birth_place'),
            'grade_entered_id' => $request->input('grade_entered_id'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'father_name' => $request->input('father_name'),
            'father_is_deceased' => $request->input('father_is_deceased'),
            'father_phone' => $request->input('father_phone'),
            'mother_name' => $request->input('mother_name'),
            'mother_is_deceased' => $request->input('mother_is_deceased'),
            'mother_phone' => $request->input('mother_phone'),
            'guardian_name' => $request->input('guardian_name'),
            'guardian_phone' => $request->input('guardian_phone'),
            'purok_street' => $request->input('purok_street'),
            'barangay' => $request->input('barangay'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'contact_person' => $request->input('contact_person'),
            'contact_person_number' => $request->input('contact_person_number'),
            'last_school_attended' => $request->input('last_school_attended'),
            'last_school_address' => $request->input('last_school_address'),
            'last_school_grade_section' => $request->input('last_school_grade_section'),
            'last_school_school_year' => $request->input('last_school_school_year')
        ]);


        if(auth()->user()) {
            $user = User::create([
                'name' => $request->input('first_name').''.$request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make('sfams'.$id),
                'student_id' => $student->id
            ]);

            $user->assignRole(RoleType::STUDENT);

            Notification::create([
                'user_id' => auth()->id(),
                'action' => 'Enrolled Student '.$student->first_name.' '.$student->last_name
            ]);
        }

        return 'student saved';
    }
}
