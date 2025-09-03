<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\UserAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        $users = User::query();
        $users = $users->where('usertype', 0);

        if ($query) {
            $users = $users->where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%');
        }

        $users = $users->get();

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

        $user->update();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->orders()->with('order_items')->get()->each(function ($order) {
            $order->order_items()->delete();
        });

        $user->orders()->with('payments')->get()->each(function ($order) {
            $order->payments()->delete();
        });

        Order::where('created_by', $id)->delete();
        CartItem::where('user_id', $id)->delete();
        UserAddress::where('user_id', $id)->delete();

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
