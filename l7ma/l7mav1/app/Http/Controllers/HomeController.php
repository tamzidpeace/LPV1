<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth:admin');
       // $this->middleware('auth:blogger');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = Role::all();
        return view('home', compact('roles'));        
    }

    public function addRole(Request $request)
    {
        $validate = $request->validate([            
            'role' => 'required|unique:roles,name',
        ]);
        $role = Role::create(['name' => $request->role, 'guard_name' => 'web']);        
        return back();
    }
}
