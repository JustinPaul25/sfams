<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchUtility;
use App\Models\PaymentUtility;
use App\Http\Requests\UpdateUtilityRequest;

class UtilitiesController extends Controller
{
    public function list()
    {
        return PaymentUtility::all();
    }

    public function index()
    {
        return view('utility.index');
    }

    public function update(UpdateUtilityRequest $request, PaymentUtility $paymentUtility)
    {
        return $paymentUtility->fill($request->post())->save();
    }

    public function branch(BranchUtility $branchUtility)
    {
        return $branchUtility;
    }

    public function branchUpdate(BranchUtility $branchUtility, Request $request)
    {
        return $branchUtility->update([
            'royalty' => $request->input('royalty'),
            'renewal' => $request->input('renewal'),
            'per_student' => $request->input('per_student'),
        ]);
    }
}
