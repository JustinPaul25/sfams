<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

                return view('home', ['branch' => $user->branch]);
            }else {
                return view('home');
            }
        } else {
            return view('home');
        }
    }
}
