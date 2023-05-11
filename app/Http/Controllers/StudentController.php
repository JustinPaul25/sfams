<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Student;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list(Request $request)
    {
        $user = auth()->user();
        $query = Student::query();

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

        if($request->filled('section')) {
            $query = $query->where('section_id', $request->input('section'));
        }

        if($request->filled('status')) {
            $query = $query->where('status', $request->input('status'));
        } else {
            $query = $query->where(function ($query) {
                $query->where('status', '!=', 'PENDING');
            });
        }

        if(!$user->isAdmin()) {
            $query->where('branch_id', $user->branch->id);
        }

        $query = $query->with(['gradeLevel', 'studentRequirement'])->get();

        return response()->json($query);
    }

    public function index()
    {
        $levels = GradeLevel::all();
        $branches = Branch::all();

        return view('students.index', ['levels' => $levels, 'branches' => $branches]);
    }

    public function create()
    {
        $levels = GradeLevel::all();
        $branches = Branch::all();

        return view('students.form', ['levels' => $levels, 'branches' => $branches]);
    }

    public function show(Student $student)
    {
        $student = Student::where('id', $student->id)->with(['gradeLevel', 'payments', 'account', 'studentRequirement', 'grades'])->first();
        return view('students.view', ['student' => $student]);
    }

    public function studentProfile()
    {
        $student = Student::where('id', auth()->user()->student_id)->with(['branch', 'gradeLevel'])->first();

        return view('students.profile', ['student' => $student]);
    }

    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    public function update(Student $student, Request $request)
    {
        return $student->update([
            'email' => $request->input('email'),
            'lrn' => $request->input('lrn'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'birth_date' => $request->input('birth_date'),
            'birth_place' => $request->input('birth_place'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'purok_street' => $request->input('purok_street'),
            'barangay' => $request->input('barangay'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'contact_person' => $request->input('contact_person'),
            'contact_person_number' => $request->input('contact_person_number'),
        ]);
    }

    public function updateRequirements(Student $student, Request $request)
    {
        return $student->studentRequirement()->update([
            'coc' => $request->input('coc'),
            'birth_cert' => $request->input('birth_cert'),
            'ECCD_checklist' => $request->input('ECCD_checklist'),
            'card' => $request->input('card'),
            'picture' => $request->input('picture'),
            'good_moral' => $request->input('good_moral'),
            'form_137' => $request->input('form_137'),
        ]);
    }

    public function payTuition(Student $student)
    {
        $student->with(['gradeLevel']);

        return view('students.pay-tuition', ['student' => $student]);
    }

    public function transactions(Student $student)
    {
        return $student->payments;
    }

    public function account(Student $student)
    {
        return $student->account;
    }
}
