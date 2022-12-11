<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchStudent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()) {
            if(auth()->user()->isStudent()) {
                $user = auth()->user();

                return view('home', ['student' => $user->student]);
            } if(auth()->user()->isBranch()) {
                $user = auth()->user();
                $branch = auth()->user()->branch; 
                $students = BranchStudent::where('branch_id', $branch->id)->where('status', 'ENROLLED')->count();

                return view('home', ['branch' => $user->branch, 'students' => $students]);
            }else {
                return view('home');
            }
        } else {
            return view('home');
        }
    }
}
