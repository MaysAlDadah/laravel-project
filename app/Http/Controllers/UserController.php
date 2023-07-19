<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
//use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
//        return response()->json($users);
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('User created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('User deleted successfully');
    }




    public function apiIndex()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function apiStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:20',
                'email' => 'required|email|max:100|unique:users,email',
                'password' => 'required|min:8|max:20',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json($user, 201);
        } catch (ValidationException $e) {
            return response()->json($e->errors(), 400);
        }
    }

    public function apiShow(User $user)
    {
        return response()->json($user);
    }

    public function apiUpdate(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:20',
                'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            ]);

            $user->update($validatedData);

            return response()->json($user);
        } catch (ValidationException $e) {
            return response()->json($e->errors(), 400);
        }
    }

    public function apiDestroy(User $user)
    {
        $user->delete();

        return response()->json('User deleted', 204);
    }
}












