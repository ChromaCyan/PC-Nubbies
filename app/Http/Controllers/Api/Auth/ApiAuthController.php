<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = Str::random(80);
        $user->api_token = hash('sha256', $token);
        $user->save();

        return response()->json([
            'access_token' => $user->api_token,
            'token_type' => 'bearer',
            'message' => 'User successfully logged in',
            'user' => $user
        ]);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
}



public function userProfile(Request $request)
{
    $user = User::where('api_token', $request->bearerToken())->first();

    if (!$user) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    return response()->json([
        'user' => $user
    ]);
}


public function logout(Request $request)
{
    $user = User::where('api_token', $request->bearerToken())->first();

    if ($user) {
        $user->api_token = null;
        $user->save();
    }

    return response()->json(['message' => 'User successfully signed out']);
}
}