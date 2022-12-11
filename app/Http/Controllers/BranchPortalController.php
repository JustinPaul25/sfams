<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchStudent;

class BranchPortalController extends Controller
{
    public function account()
    {
        $branch = auth()->user()->branch;
        $students = BranchStudent::where('branch_id', $branch->id)->where('status', 'ENROLLED')->count();

        return view('portal.branch.account', ['branch' => $branch, 'students' => $students]);
    }
}
