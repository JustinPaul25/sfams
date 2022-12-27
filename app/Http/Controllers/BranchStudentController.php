<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\GradeLevel;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use App\Models\BranchAccount;
use App\Models\BranchStudent;
use App\Models\BranchUtility;
use Torann\GeoIP\Console\Update;

class BranchStudentController extends Controller
{
    public function index()
    {
        $levels = GradeLevel::all();
        $branches = Branch::all();

        return view('portal.branch.student.index', ['levels' => $levels, 'branches' => $branches]);
    }

    public function list(Request $request)
    {
        $branch = auth()->user()->branch;
        $query = BranchStudent::query();

        if($request->filled('name')) {
            $search = $request->input('name');
            $query = $query->where(function($q) use ($search){
                $q->where('first_name', 'LIKE', '%'.$search.'%')
                ->orWhere('last_name', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->filled('level')) {
            $query = $query->where('grade_level_id', $request->input('level'));
        }

        if($request->filled('status')) {
            $query = $query->where('status', $request->input('status'));
        }

        $query = $query->where('branch_id', $branch->id)->get();

        return response()->json($query);
    }

    public function create()
    {   
        $levels = GradeLevel::all();

        return view('portal.branch.student.create', ['levels' => $levels]);
    }
    
    public function store(Request $request)
    {
        $branch = auth()->user()->branch;
        $current_sy = SchoolYear::where('status', 'active')->first();
        $utility = BranchUtility::find(1);

        BranchStudent::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'grade_level_id' => $request->input('grade_level_id'),
            'branch_id' => $branch->id,
            'status' => 'ENROLLED',
            'school_year_id' => $current_sy->id,
        ]);

        $account = BranchAccount::where('branch_id', $branch->id)->first();

        $account->update([
            'royalty' => $account->royalty + $utility->per_student
        ]);
        
        return;
    }

    public function reenroll(BranchStudent $branchStudent)
    {   
        $utility = BranchUtility::find(1);

        $account = BranchAccount::where('branch_id', $branchStudent->branch_id)->first();

        $account->update([
            'royalty' => $account->royalty + $utility->per_student,
        ]);

        return $branchStudent->update([
            'status' => 'ENROLLED',
            'grade_level_id' => $branchStudent->grade_level_id + 1
        ]);
    }
}
