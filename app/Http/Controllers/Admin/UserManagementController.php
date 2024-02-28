<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();

        return Inertia::render(
            'Admin/UserManagement/Index',
            [
                'users' => $users,
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|boolean',
            'age_range' => 'required|boolean',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->age_range = $request->age_range;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'gender' => 'required|boolean',
            'age_range' => 'required|boolean',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->age_range = $request->age_range;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->update();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
