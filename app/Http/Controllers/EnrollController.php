<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Enroll;

class EnrollController extends Controller
{
    public function datas()
    {
        $user = auth()->user();

        if(!$user->isAdmin() && !$user->isStaff()) {
            $branch = Branch::where('user_id', $user->id)->first();
            $enrolls = Enroll::where('branch_id', $branch->id)->get();
            $yearsCount = Enroll::where('branch_id', $branch->id)->count();
        } else {
            $branch = Branch::where('user_id', $user->id)->first();
            $enrolls = Enroll::get();
            $yearsCount = Enroll::count();
        }

        if($enrolls[0]->students) {
            $rates = [];
            $devidend = (($enrolls[$yearsCount-1]->students/$enrolls[0]->students)/$enrolls[0]->students)*100;

            foreach($enrolls as $key => $enroll) {
                if($key === 0) {
                    array_push($rates, null);
                } else {
                    $devidend = (($enroll->students/$enrolls[$key-1]->students)/$enrolls[$key-1]->students)*100;
                    array_push($rates, $devidend);
                }
            }

            $total = 0;
            foreach($rates as $rate) {
                $total = $total + $rate;
            }

            if(count($rates) > 1) {
                $rate = $total/(count($rates)-1);
                $rate = $rate/(10 ** 2);
            }

            if(!$user->isAdmin() && !$user->isStaff()) {
                return response()->json(['enroll' => Enroll::where('branch_id', $branch->id)->get(), 'rate' => round($rate,5)]);
            } else {
                return response()->json(['enroll' => Enroll::get(), 'rate' => round($rate,5)]);
            }
        }

        return 'No Data';
    }
}
