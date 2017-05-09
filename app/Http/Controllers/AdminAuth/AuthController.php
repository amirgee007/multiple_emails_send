<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use function foo\func;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class  AuthController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';
    protected $guard = 'admin';


    public function showLoginForm( ){

        if (Auth::user()) {
            return redirect('admin/dashboard');
        }

        return view('admin.login');
    }

        public function logout(){

            Auth::logout();
            return redirect('/');

    }

}
