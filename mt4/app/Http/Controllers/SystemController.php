<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    public function get_current_user() {
        return Auth::user();
    }
}
