<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Mail\PayTuition;
use Illuminate\Http\Request;
use App\Models\PaymentUtility;
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

        $student->payments()->create([
            'description' => $desc,
            'amount' => $request->input('entrance') + $request->input('misc') + $request->input('tuition') + $request->input('books') + $request->input('handbook') + $request->input('id_fee') + $request->input('back_account') + $request->input('closing') + $request->input('graduation'),
        ]);

        Mail::to($student->email)->send(new PayTuition($student, $desc));

        return 'Successfully Paid';
    }
}
