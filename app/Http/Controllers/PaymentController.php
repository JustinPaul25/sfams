<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Mail\PayBranch;
use App\Models\Student;
use App\Mail\PayTuition;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Events\NotifyStudent;
use App\Models\PaymentUtility;
use App\Models\StudentNotification;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function tuition(Request $request)
    {
        $student = Student::find($request->input('student_id'));
        $account = $student->account;

        $desc = 'Tuition Payment';
        $desc = $desc.' [Entrance: ₱ '.$request->input('entrance').', Miscellaneous: ₱ '.$request->input('misc').', Tuition: ₱ '.$request->input('tuition').', Books: ₱ '.$request->input('books').', Hand Book: ₱ '.$request->input('handbook').', Student ID: ₱ '.$request->input('id_fee').', Back Account: ₱ '.$request->input('back_account').', Closing: ₱ '.$request->input('closing').', Graduation: ₱ '.$request->input('graduation').'].';

        $student->account()->update([
            'back_account' => $account->back_account - $request->input('back_account'),
            'entrance' => $account->entrance - $request->input('entrance'),
            'misc' => $account->misc - $request->input('misc'),
            'tuition' => $account->tuition - $request->input('tuition'),
            'books' => $account->books - $request->input('books'),
            'handbook' => $account->handbook - $request->input('handbook'),
            'id_fee' => $account->id_fee - $request->input('id_fee'),
            'closing' => $account->closing - $request->input('closing'),
            'graduation' => $account->graduation - $request->input('graduation'),
        ]);

        $current_sy = SchoolYear::where('status', 'active')->first();

        $student->payments()->create([
            'school_year_id' => $current_sy->id,
            'description' => $desc,
            'amount' => $request->input('entrance') + $request->input('misc') + $request->input('tuition') + $request->input('books') + $request->input('handbook') + $request->input('id_fee') + $request->input('back_account') + $request->input('closing') + $request->input('graduation'),
            'type' => 'STUDENT',
            'section_id' => $request->section_id,
            'grade_level_id' => $student->grade_entered_id,
        ]);

        StudentNotification::create([
            'student_id' => $student->id,
            'message' => "successfully paid the tuition amount of ₱" . $request->input('entrance') + $request->input('misc') + $request->input('tuition') + $request->input('books') + $request->input('handbook') + $request->input('id_fee') + $request->input('back_account') + $request->input('closing') + $request->input('graduation'),
        ]);

        Mail::to($student->email)->send(new PayTuition($student, $desc));
        broadcast(new NotifyStudent($student))->toOthers();

        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->withProperties(['action' => 'Recieve payment on student.'])
            ->log($desc);

        return 'Successfully Paid';
    }

    public function branch(Request $request)
    {
        $branch = Branch::find($request->input('branch_id'));
        $account = $branch->branchAccount;
        $user = $branch->user;

        $desc = 'Branch Payment';
        $desc = $desc.' [Back Account: ₱ '.$request->input('back_account').', Renewal: ₱ '.$request->input('renewal').', Royalty: ₱ '.$request->input('royalty').', Students Fee: ₱ '.$request->input('per_student_total').'].';

        $branch->branchAccount()->update([
            'back_account' => $account->back_account - $request->input('back_account'),
            'renewal' => $account->renewal - $request->input('renewal'),
            'royalty' => $account->royalty - $request->input('royalty'),
            'per_student_total' => $account->per_student_total - $request->input('per_student_total'),
        ]);

        $current_sy = SchoolYear::where('status', 'active')->first();

        $branch->payments()->create([
            'school_year_id' => $current_sy->id,
            'description' => $desc,
            'amount' => $request->input('back_account') + $request->input('renewal') + $request->input('royalty') + $request->input('per_student_total'),
            'type' => 'BRANCH',
        ]);

        Mail::to($user->email)->send(new PayBranch($branch, $desc));

        activity()
            ->performedOn($branch)
            ->causedBy(auth()->user())
            ->withProperties(['action' => 'Recieve Payment on branch.'])
            ->log($desc);

        return 'Successfully Paid';
    }
}
