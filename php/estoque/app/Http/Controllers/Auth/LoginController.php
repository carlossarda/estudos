<?php

namespace estoque\Http\Controllers\Auth;

use estoque\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

//    use AuthenticatesUsers;
//
//    protected $redirectTo = '/home';
//
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function form()
    {
        return view('form_login');
    }

    public function login()
    {
        $credenciais = Request::only('email','password');
        if(Auth::attempt($credenciais)){
            return redirect('/produtos');
        }

        return "usuário não existe";
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
