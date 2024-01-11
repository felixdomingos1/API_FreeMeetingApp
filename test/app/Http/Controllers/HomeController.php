<?php

namespace App\Http\Controllers;

use App\Models\Receitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\Vue;

class HomeController extends Controller
{
    
    public function index()
    {
        if (Auth::id()) {

                //  $receitas = Receitas::all();

                return view('layouts.home');
                // return view('layouts.home')->with('receitas',$receitas );
        }

    }


    public function show()
    {
        if ( Auth::id()) {
            
            return view('layouts.home');
        }
       return  view('app');
    }
}
