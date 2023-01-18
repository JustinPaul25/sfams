<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    public function subjects()
    {
        $user = auth()->user();
        $subject = Subject::where('branch_id', $user->branch->id)->where('is_archived', false)->orderBy('name', 'asc')->get();

        return $subject;
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $branch_id = $user->branch->id;
        $request->validate([
           'name' => [
			'required',
			'string',
            Rule::unique('subjects')
                ->where(function ($query) use ($branch_id){
                    return $query->where('branch_id', $branch_id);
                })
            ]
        ]);

        return Subject::create([
            'branch_id' => $user->branch->id,
            'name' => $request->input('name'),
        ]);
    }

    public function update(Request $request, Subject $subject)
    {
        $user = auth()->user();
        $branch_id = $user->branch->id;
        $request->validate([
           'name' => [
			'required',
			'string',
            Rule::unique('subjects')
                ->where(function ($query) use ($branch_id){
                    return $query->where('branch_id', $branch_id)->where('id', '!=',  request('id'));
                })
            ]
        ]);

        return $subject->update([
            'name' => $request->input('name'),
        ]);
    }

    public function destroy(Subject $subject)
    {
        return $subject->update([
            'is_archived' => true
        ]);
    }
}
