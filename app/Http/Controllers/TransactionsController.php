<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function list(Request $request)
    {
        $payments = Payment::query();

        if($request->filled('type')) {
            $payments = $payments->where('type', $request->input('type'));
        }

        if($request->filled('sortBy')) {
            if($request->input('sortBy')  === "date") {
                $payments = $payments->whereDate('created_at', '=', date($request->input('date')));
            }

            if($request->input('sortBy')  === "month") {
                $month = explode("-", $request->input('month'));
            
                $payments = $payments->whereYear('created_at', '=', $month[0])
                                    ->whereMonth('created_at', '=', $month[1]);
            }

            if($request->input('sortBy')  === "year") {
                $payments = $payments->whereYear('created_at', '=', $request->input('year'));
            }

            if($request->input('sortBy')  === "range") {
                $to = date('Y-m-d', strtotime($request->input('to'). ' + 1 days')); 
                $payments = $payments->whereBetween('created_at', [date($request->input('from')), date($to)]);
            }
        }

        $payments = $payments->with(['branch', 'student'])->get();

        return $payments;
    }
}
