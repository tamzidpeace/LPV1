<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Redirect;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    protected function redirectTo()
    {
        $user = Auth::user();
        $host = $_SERVER['HTTP_HOST'];;
        //if($host == 'localhost:8000') Auth::logout();
        $website = Website::where('user_id', $user->id)->first();
        $domain = Hostname::where('website_id', $website->id)->first();
        $host = $domain->fqdn;
        $this->redirectTo = 'http://' . $host . ':8000';
        return $this->redirectTo;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
