<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestController extends Controller
{
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

    public function index(Request $request) {
        return Auth::user();
    }
}
