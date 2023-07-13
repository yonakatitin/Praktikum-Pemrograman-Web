<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {
        $users = User::latest() 
                ->orderBy('name', 'asc')
                ->get();
 
        return view('users.index', ['users' => $users]);
 
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|unique:users,no_hp|max:13',
            'email' => 'required|email|unique:users,email|regex:/^[A-Za-z0-9._%+-]+@gmail\.com$/',
            'password' => 'required|min:8',
        ]);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|max:13|unique:users,no_hp,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id . '|regex:/^[A-Za-z0-9._%+-]+@gmail\.com$/',
            'password' => 'nullable|min:8',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $users = User::where('name', 'like', "%$keyword%")
            ->orWhere('alamat', 'like', "%$keyword%")
            ->orWhere('no_hp', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
            ->get();

        return view('users.index', compact('users'));
    }
}
