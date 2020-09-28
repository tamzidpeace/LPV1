<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant\User;
use Illuminate\Support\Facades\Auth;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $users = User::all();

        // $website = new Website();
        // $website->user_id = $user->id;        
        // app(WebsiteRepository::class)->create($website);

        // $hostname = new Hostname();
        // $hostname->fqdn = $user->name . '.localhost';
        // app(HostnameRepository::class)->attach($hostname, $website);
        $website   = \Hyn\Tenancy\Facades\TenancyFacade::website();
        $user_id = $website->user_id;
        if($user->id == $user_id)
            return $users;
        else 
            return "unautharized";
    }
}
