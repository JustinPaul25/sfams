<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Mail\CreateBranch;
use Illuminate\Http\Request;
use App\Models\BranchAccount;
use App\Models\BranchUtility;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Commands\CreateRole;

class BranchController extends Controller
{
    public function list()
    {
        $branch = Branch::query();

        $branch = $branch->get();

        return $branch;
    }

    public function index()
    {
        return view('branch.index');
    }

    public function create()
    {
        return view('branch.create');
    }

    public function store(Request $request)
    {
        $utility = BranchUtility::find(1);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('branchpassword'),
        ]);

        $branch = Branch::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'user_id' => $user->id,
            'student_count' => $request->input('students'),
        ]);

        BranchAccount::create([
            'branch_id' => $branch->id,
            'back_account' => 0,
            'renewal' => $utility->renewal,
            'royalty' => $utility->royalty,
            'per_student_total' => $request->input('students') * $utility->per_student,
        ]);

        Mail::to($user->email)->send(new CreateBranch($branch));

        return 'Branch Created';
    }
}
