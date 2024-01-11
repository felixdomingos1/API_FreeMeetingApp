<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Receitas;
use App\Models\Share;
use App\Providers\UserDataServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ReceitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Receitas::all();
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'ingredient' => 'required|string|max:255',
                'preparationMethod' => 'required|string',
            ]);
            $receitas = Receitas::all();

            $userId = Auth::id();
            
            $file = $request->file('receitaImg');
            $caminho = $file ->store('public');

            $receita = $request->all();

            $receita['receitaImg'] = $caminho;
            $receita['sharedBy'] = 0;
            $receita['user_id'] = $userId;


            $newReceita = new Receitas($receita);
            $newReceita->save();
            
            return redirect('/home');

        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->messages();

            return redirect()->back()->withErrors($errors)->withInput();
        }
       
    }

    public function showMyReceitas () 
    {
        return view('layouts.myReceitas');
    }

    public function sharing($receitaId,$userId,$receitaUserId)
    {
         $newNotification = new Notification(['type'=>'shared','notifiedBy_id'=> $userId,'receitas_id'=>$receitaId,'receitaUserId'=>$receitaUserId]);
        $newNotification->save();
        $newSharing = new Share(['receita_id'=>$receitaId,'sharedBy_id'=>$userId]);
        $newSharing->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
