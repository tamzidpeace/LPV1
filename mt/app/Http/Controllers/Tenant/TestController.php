<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Tenant\User;
use App\User;
use Illuminate\Support\Facades\Auth;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;

class TestController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(Request $request)
    {
        
        //return Auth::user();
        // this is a very important code,
        return $request->header('user');
        //return $request->user;
        return User::all();
        //$user = Auth::user();
        //$users = User::all();
        
        $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();
        if (isset($fqdn)) {
            $fqdn      = $hostname->fqdn;
            $fqdn;
        }
        return $user;

        // $website = new Website();
        // $website->user_id = $user->id;
        // app(WebsiteRepository::class)->create($website);

        // $hostname = new Hostname();
        // $hostname->fqdn = $user->name . '.localhost';
        // app(HostnameRepository::class)->attach($hostname, $website);
        $website   = \Hyn\Tenancy\Facades\TenancyFacade::website();
        $user_id = $website->user_id;
        if ($user->id == $user_id) {
            return $users;
        } else {
            return "unautharized";
        }
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
