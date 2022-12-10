<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Enroll;
use App\Models\Section;
use App\Models\Student;
use App\Types\RoleType;
use App\Models\GradeLevel;
use App\Models\SchoolYear;
use App\Models\Requirement;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\StudentEnrolled;
use App\Models\PaymentUtility;
use App\Models\StudentRequirements;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EnrollmentController extends Controller
{
    public function applications()
    {
        $levels = GradeLevel::all();

        return view('enrollment.application', ['levels' => $levels]);
    }

    public function applicationList(Request $request)
    {
        $query = Student::query();

        if($request->filled('name')) {
            $search = $request->input('name');
            $query = $query->where(function($q) use ($search){
                $q->where('first_name', 'LIKE', '%'.$search.'%')
                ->orWhere('last_name', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->filled('level')) {
            $query = $query->where('grade_level_id', $request->input('level'));
        }
        
        $query = $query->where('status', 'PENDING')->with(['gradeLevel'])->get();


        return response()->json($query);
    }

    public function index()
    {
        $levels = GradeLevel::all();

        return view('online-enrollment', ['levels' => $levels]);
    }

    public function store(Request $request)
    {
        $status = 'PENDING';

        if($request->input('grade_entered_id') < 3) {
            $department = 'KINDER';
        }

        if($request->input('grade_entered_id') > 2 && $request->input('grade_entered_id') < 9) {
            $department = 'ELEM';
        }

        if($request->input('grade_entered_id') > 8 && $request->input('grade_entered_id') < 13) {
            $department = 'SRH';
        }

        $id = IdGenerator::generate(['table' => 'students', 'length' => 6, 'prefix' => date('y')]);

        $student = Student::create([
            'enrollment_id' => $id,
            'email' => $request->input('email'),
            'department' => $department,
            'status' => $status,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'birth_date' => $request->input('birth_date'),
            'birth_place' => $request->input('birth_place'),
            'grade_entered_id' => $request->input('grade_entered_id'),
            'grade_level_id' => $request->input('grade_entered_id'),
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

        return $student;
    }

    public function paymentForm(Student $student)
    {
        $levels = GradeLevel::all();
        $department = '';
        $departmentReq = '';

        if($student->grade_entered_id < 8) {
            $department = 'Elementary';
            if($student->grade_entered_id === 2) {
                $departmentReq = Requirement::where('department', 'Elementary')
                    ->where('transferee', false)->first();
            } else if($student->grade_entered_id === 1) {
                $departmentReq = Requirement::where('department', 'Kinder')->first();
            } else {
                $departmentReq = Requirement::where('department', 'Elementary')
                    ->where('transferee', true)->first();
            }
        } else if ( $student->grade_entered_id < 12 ) {
            $department = 'Junior High';
            if($student->grade_entered_id === 8) {
                $departmentReq = Requirement::where('department', 'Junior High')
                    ->where('transferee', false)->first();
            } else {
                $departmentReq = Requirement::where('department', 'Junior High')
                    ->where('transferee', true)->first();
            }
        } else {
            $department = 'Senior High';
            if($student->grade_entered_id === 11) {
                $departmentReq = Requirement::where('department', 'Junior High')
                    ->where('transferee', false)->first();
            } else {
                $departmentReq = Requirement::where('department', 'Junior High')
                    ->where('transferee', true)->first();
            }
        }

        $fees = PaymentUtility::where('type', $department)->first();

        $sections = Section::all();

        return view('enrollment.payment-form', ['student' => $student, 'levels' => $levels, 'fees' => $fees, 'requirements' => $departmentReq, 'sections' => $sections]);
    }

    public function enrollNewStudent(Request $request)
    {
        $student = Student::find($request->input('student_id'));
        $desc = 'Enrollment Payment';

        $desc = $desc.' [Entrance: ₱ '.$request->input('entrance').', Miscellaneous: ₱ '.$request->input('misc').', Tuition: ₱ '.$request->input('tuition').', Books: ₱ '.$request->input('books').', Hand Book: ₱ '.$request->input('handbook').', Student ID: ₱ '.$request->input('id_fee').'] Discount: ₱'.$request->input('discount').'.';

        $student->account()->create([
            'back_account' => 0,
            'entrance' => $request->input('fees')['entrance'] - $request->input('entrance'),
            'misc' => $request->input('fees')['misc'] - $request->input('misc'),
            'tuition' => $request->input('fees')['tuition'] - $request->input('tuition'),
            'books' => $request->input('fees')['books'] - $request->input('books'),
            'handbook' => $request->input('fees')['handbook'] - $request->input('handbook'),
            'id_fee' => $request->input('fees')['id_fee'] - $request->input('id_fee'),
            'closing' => 0,
            'graduation' => 0,
            'discount' => $request->input('discount'),
        ]);

        if($request->input('discount') !== 0) {
            $fees = ['entrance' => $student->account->entrance, 'misc' => $student->account->misc, 'tuition' => $student->account->tuition, 'books' => $student->account->books, 'handbook' => $student->account->handbook, 'id_fee' => $student->account->id_fee];

            $dc = $request->input('discount');
            foreach($fees as $id => $fee) {
                if($fee < $dc) {
                    $dc = $dc - $fee;
                    $fees[$id] = 0;
                } else {
                    $fees[$id] = $fee - $dc;
                    $dc = 0;
                }
                if($dc === 0) {
                    break;
                }
            }

            $student->account()->update([
                'entrance' => $fees['entrance'],
                'misc' => $fees['misc'],
                'tuition' => $fees['tuition'],
                'books' => $fees['books'],
                'handbook' => $fees['handbook'],
                'id_fee' => $fees['id_fee'],
            ]);
        }

        $current_sy = SchoolYear::where('status', 'active')->first();

        $enroll = Enroll::Where('school_year_id', $current_sy->id)->first();

        $enroll->update([
            'students' => $enroll->students + 1,
        ]);

        $student->payments()->create([
            'school_year_id' => $current_sy->id,
            'description' => $desc,
            'amount' => $request->input('entrance') + $request->input('misc') + $request->input('tuition') + $request->input('books') + $request->input('handbook') + $request->input('id_fee'),
            'type' => 'STUDENT',
            'section_id' => $request->input('section'),
            'grade_level_id' => $student->grade_entered_id,
        ]);
        
        $student->studentRequirement()->create([
            'coc' => $request->input('coc'),
            'birth_cert' => $request->input('birth_cert'),
            'ECCD_checklist' => $request->input('ECCD_checklist'),
            'card' => $request->input('card'),
            'picture' => $request->input('picture'),
            'good_moral' => $request->input('good_moral'),
            'form_137' => $request->input('form_137'),
        ]);

        $user = User::create([
            'name' => $student->first_name.' '.$student->middle_name.' '.$student->last_name,
            'email' => $student->email,
            'student_id' => $student->id,
            'password' => Hash::make('sfams_password_'.$student->id),
        ]);

        $user->assignRole(RoleType::STUDENT);

        $student->grades()->create([
            'section_id' => $request->input('section'),
            'grade_level_id' => $student->grade_entered_id,
            'average' => 0,
            'school_year_id' => $current_sy->id,
        ]);

        $student->update([
            'section_id' => $request->input('section'),
            'status' => 'ENROLLED'
        ]);

        Mail::to($student->email)->send(new StudentEnrolled($student));

        return 'enrolled successfully';
    }

    public function reenroll(Student $student)
    {
        $levels = GradeLevel::all();

        $department = '';

        if($student->grade_level_id + 1 < 8) {
            $department = 'Elementary';
        } else if ( $student->grade_level_id + 1 < 12 ) {
            $department = 'Junior High';
        } else {
            $department = 'Senior High';
        }

        $sections = Section::all();

        $fees = PaymentUtility::where('type', $department)->first();

        return view('enrollment/reenroll-form', ['student' => $student, 'levels' => $levels, 'fees' => $fees, 'sections' => $sections]);
    }

    public function enrollOldStudent(Request $request)
    {
        $student = Student::find($request->input('student_id'));
        $desc = 'Enrollment Payment';

        $desc = $desc.' [Entrance: ₱ '.$request->input('entrance').', Miscellaneous: ₱ '.$request->input('misc').', Tuition: ₱ '.$request->input('tuition').', Books: ₱ '.$request->input('books').', Hand Book: ₱ '.$request->input('handbook').', Student ID: ₱ '.$request->input('id_fee').'] Discount: ₱'.$request->input('discount').'.';

        $student->account()->update([
            'back_account' => $student->account->back_account - $request->input('back_account'),
            'entrance' => $request->input('fees')['entrance'] - $request->input('entrance'),
            'misc' => $request->input('fees')['misc'] - $request->input('misc'),
            'tuition' => $request->input('fees')['tuition'] - $request->input('tuition'),
            'books' => $request->input('fees')['books'] - $request->input('books'),
            'handbook' => $request->input('fees')['handbook'] - $request->input('handbook'),
            'id_fee' => $request->input('fees')['id_fee'] - $request->input('id_fee'),
            'closing' => $request->input('fees')['closing'] - $request->input('closing'),
            'graduation' => $request->input('fees')['graduation'] - $request->input('graduation'),
            'discount' => $request->input('discount'),
        ]);

        if($request->input('discount') !== 0) {
            $fees = ['back_account' => $student->account->back_account, 'entrance' => $student->account->entrance, 'misc' => $student->account->misc, 'tuition' => $student->account->tuition, 'books' => $student->account->books, 'handbook' => $student->account->handbook, 'id_fee' => $student->account->id_fee];

            $dc = $request->input('discount');
            foreach($fees as $id => $fee) {
                if($fee < $dc) {
                    $dc = $dc - $fee;
                    $fees[$id] = 0;
                } else {
                    $fees[$id] = $fee - $dc;
                    $dc = 0;
                }
                if($dc === 0) {
                    break;
                }
            }

            $student->account()->update([
                'entrance' => $fees['entrance'],
                'misc' => $fees['misc'],
                'tuition' => $fees['tuition'],
                'books' => $fees['books'],
                'handbook' => $fees['handbook'],
                'id_fee' => $fees['id_fee'],
            ]);
        }

        $current_sy = SchoolYear::where('status', 'active')->first();

        $enroll = Enroll::Where('school_year_id', $current_sy->id)->first();

        $enroll->update([
            'students' => $enroll->students + 1,
        ]);

        $student->payments()->create([
            'school_year_id' => $current_sy->id,
            'description' => $desc,
            'amount' => $request->input('entrance') + $request->input('misc') + $request->input('tuition') + $request->input('books') + $request->input('handbook') + $request->input('id_fee'),
            'type' => 'STUDENT',
            'section_id' => $request->input('section'),
            'grade_level_id' => $student->grade_level_id + 1,
        ]);

        $student->grades()->create([
            'section_id' => $request->input('section'),
            'grade_level_id' => $student->grade_level_id+1,
            'average' => 0,
            'school_year_id' => $current_sy->id,
        ]);

        $student->update([
            'section_id' => $request->input('section'),
            'status' => 'ENROLLED'
        ]);

        Mail::to($student->email)->send(new StudentEnrolled($student));
    }
}
