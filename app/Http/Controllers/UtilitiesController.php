<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUtilityRequest;
use Illuminate\Http\Request;
use App\Models\PaymentUtility;

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
}
