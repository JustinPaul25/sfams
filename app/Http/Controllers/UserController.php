<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function list(Request $request)
    {
        $user = User::where('name', 'LIKE', '%'.$request->input('name').'%')->get();
        return $user;
    }

    public function create()
    {
        $type = "CREATE";
        return view('users.form', [
            'type' => $type,
            'user' => null
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('SFAMS2022')
        ]);

        return 'User Created Successfully';
    }

    public function show(User $user)
    {
        $type = "EDIT";
        return view('users.form', [
            'type' => $type,
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        return 'User Updated Succesfully';
    }

    public function destroy(User $user)
    {
        $user->delete();

        return 'User deleted successfully';
    }
}
