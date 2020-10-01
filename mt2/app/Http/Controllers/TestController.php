<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function users()
    {
        return User::all();
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
