<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function datas()
    {
        $enroll = Enroll::get();
        $yearsCount = Enroll::count();

        $devidend = (($enroll[$yearsCount-1]->students/$enroll[0]->students)/$enroll[0]->students)*100;

        $rate = $devidend/$yearsCount;

        return response()->json(['enroll' => Enroll::get(), 'rate' => round($rate,2)]);
    }
}
