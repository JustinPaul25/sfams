<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function datas()
    {
        $enrolls = Enroll::get();
        $yearsCount = Enroll::count();

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

            $rate = $total/(count($rates)-1);

            $rate = $rate/(10 ** 2);

            return response()->json(['enroll' => Enroll::get(), 'rate' => round($rate,5)]);
        }

        return 'No Data';
    }
}
