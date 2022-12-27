<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchStudent;
use App\Models\Enroll;
use App\Models\Student;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SchoolYearController extends Controller
{
    public function list()
    {
        return SchoolYear::get();
    }

    public function newSchoolYear(Request $request)
    {
        $check = Hash::check($request->input('password'), auth()->user()->password);

        if(!$check) {
            return 'Not Matched!';
        } else {
            $branches = Branch::get();
            $students = Student::where('status', 'ENROLLED')->get();
            $branchStudents = BranchStudent::where('status', 'ENROLLED')->get();

            foreach ($students as $student) {
                $student->update([
                    'status' => 'REENROLL'
                ]);

                $account = $student->account;

                $account->update([
                    'back_account' => $account->back_account + $account->entrance + $account->misc + $account->tuition + $account->books + $account->handbook + $account->id_fee + $account->closing + $account->graduation,
                    'entrance' => 0,
                    'misc' => 0,
                    'tuition' => 0,
                    'books' => 0,
                    'handbook' => 0,
                    'id_fee' => 0,
                    'closing' => 0,
                    'graduation' => 0,
                    'discount' => 0,
                ]);
            }

            foreach($branchStudents as $student) {
                $student->update([
                    'status' => 'OLD'
                ]);
            }

            foreach ($branches as $branch) {
                $account = $branch->branchAccount;

                $account->update([
                    'back_account' => $account->back_account + $account->renewal + $account->royalty,
                    'renewal' => 0,
                    'royalty' => 0,
                    'per_student_total' => 0,
                ]);
            }

            $sy = SchoolYear::latest()->first();
            
            SchoolYear::query()->update(['status' => 'in-active']);

            $school = SchoolYear::create([
                'from' => $sy->to,
                'to' => $sy->to + 1,
                'status' => 'active'
            ]);
    
            Enroll::create([
                'school_year_id' => $school->id,
                'students' => 0
            ]);

            return;
        }
    }
}
