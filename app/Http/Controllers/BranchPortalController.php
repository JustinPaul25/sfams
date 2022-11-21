<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchPortalController extends Controller
{
    public function account()
    {
        $branch = auth()->user()->branch;

        return view('portal.branch.account', ['branch' => $branch]);
    }
}
