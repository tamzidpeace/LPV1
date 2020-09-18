<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function logout()
    {
        $user = Auth::logout();
        return \redirect(route('home'));
    }

    public function index()
    {
        if (Auth::user()) {
            return view('admin.pages.master');
        } else {
            Auth::logout();
            return \redirect(route('home'));
        }
    }
}
