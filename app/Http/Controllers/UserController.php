<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view("users.register");
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['group_id'] = '2';

        $user = User::create($formFields);

        auth()->Login($user);

        return redirect('/');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            "email" => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function edit(User $user)
    {
        if ($user->id != auth()->id() && auth()->user()->group_id != 1) {
            abort(403, 'Unauthorized Action!');
        }
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {

        if ($user->id != auth()->id() && auth()->user()->group_id != 1) {
            abort(403, 'Unauthorized Action!');
        }

        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email'],
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'confirmed|min:6',
            ]);
            $formFields['password'] = bcrypt($request->password);
        }


        $user->update($formFields);

        return back();
    }

    public function destroy(User $user)
    {
        if ($user->id != auth()->id() && auth()->user()->group_id != 1) {
            abort(403, 'Unauthorized Action!');
        }
        $user->delete();

        return redirect('/users/list');
    }

    public function show()
    {
        return view('users.users-list', [
            'users' => User::latest()->paginate(10),
        ]);
    }

    public function createNewUser(){

        $groups = Group::all();

        return view('users.create',compact('groups'));
    }

    public function storeNewUser(Request $request)
    {
        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "group_id" =>'required|exists:groups,id',
            'password' => 'required|confirmed|min:6',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        return redirect('/users/list');
    }

    public function adminEdit(User $user)
    {
        $groups = Group::all();
        if ($user->id != auth()->id() && auth()->user()->group_id != 1) {
            abort(403, 'Unauthorized Action!');
        }
        return view('users.edit-admin', ['user' => $user],compact('groups'));
    }

    public function adminUpdate(User $user, Request $request) {
        

        if ($user->id != auth()->id() && auth()->user()->group_id != 1) {
            abort(403, 'Unauthorized Action!');
        }

        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email'],
            "group_id" => 'required|exists:groups,id',
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'confirmed|min:6',
            ]);
            $formFields['password'] = bcrypt($request->password);
        }


        $user->update($formFields);

        return back();
    }
}