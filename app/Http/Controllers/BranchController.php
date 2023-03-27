<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Enroll;
use App\Types\RoleType;
use App\Mail\CreateBranch;
use Illuminate\Http\Request;
use App\Models\BranchAccount;
use App\Models\BranchUtility;
use App\Models\PaymentUtility;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Commands\CreateRole;

class BranchController extends Controller
{
    public function list()
    {
        $branch = Branch::query();

        $branch = $branch->orderBy('name', 'asc')->get();

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
            'name' => ucwords($request->input('name')),
            'address' => $request->input('address'),
            'user_id' => $user->id,
            'student_count' => $request->input('students'),
        ]);

        BranchAccount::create([
            'branch_id' => $branch->id,
            'back_account' => 0,
            'renewal' => $utility->renewal,
            'royalty' => $request->input('students') * $utility->per_student,
            'per_student_total' => 0,
        ]);

        Enroll::create([
            'school_year_id' => 1,
            'students' => 0,
            'branch_id' => $branch->id,
        ]);

        $user->assignRole(RoleType::BRANCH);

        PaymentUtility::create([
            'branch_id' => $branch->id,
            'type' => 'Elementary',
            'entrance' => 1000.00,
            'misc' => 200.00,
            'tuition' => 9000.00,
            'books' => 4000.00,
            'handbook' => 100.00,
            'id_fee' => 100.00,
            'closing' => 300.00,
            'graduation' => 700.00
        ]);

        PaymentUtility::create([
            'branch_id' => $branch->id,
            'type' => 'Junior High',
            'entrance' => 2000.00,
            'misc' => 300.00,
            'tuition' => 10000.00,
            'books' => 5000.00,
            'handbook' => 200.00,
            'id_fee' => 200.00,
            'closing' => 400.00,
            'graduation' => 800.00
        ]);

        PaymentUtility::create([
            'branch_id' => $branch->id,
            'type' => 'Senior High',
            'entrance' => 3000.00,
            'misc' => 400.00,
            'tuition' => 11000.00,
            'books' => 6000.00,
            'handbook' => 300.00,
            'id_fee' => 300.00,
            'closing' => 500.00,
            'graduation' => 900.00
        ]);

        Mail::to($user->email)->send(new CreateBranch($branch, $user));

        return 'Branch Created';
    }

    public function view(Branch $branch)
    {
        return view('branch.view', ['branch' => $branch, 'account' => $branch->branchAccount, 'transactions' => $branch->payments]);
    }

    public function pay(Branch $branch)
    {
        return view('branch.pay', ['branch' => $branch]);
    }

    public function transactions(Branch $branch)
    {
        return $branch->payments;
    }

    public function account(Branch $branch)
    {
        return $branch->branchAccount;
    }
}
