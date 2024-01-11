<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Receitas;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index() 
    {
        if (Auth::id()) {
            // $receitas = Receitas::all();
            return view('layouts.home');
            // return view('layouts.home')->with('receitas',$receitas );
        }
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {

            $user = User::where('email', $credentials['email']);
            $receitas = Receitas::all();

            return view('layouts.home')->with( 'receitas',$receitas); // Redirecionar para a página desejada após o login
        }

        return redirect('/login')->with('error', 'Credenciais inválidas');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


}
