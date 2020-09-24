<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Customer;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function users()
    {
        $users = User::all();
        return \response()->json($users, 200);
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        if (!Auth::attempt($login)) {
            return \response(['message' => 'invalid login credential!']);
        } else {
            $token = Auth::user()->createToken('authTokern')->accessToken;

            return \response(['user' => Auth::user(), 'token' => $token]);
        }
    }

    // signup
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8|string',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    // logout
    public function logout(Request $request)
    {        
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
