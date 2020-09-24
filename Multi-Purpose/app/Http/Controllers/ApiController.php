<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Customer;

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
}
