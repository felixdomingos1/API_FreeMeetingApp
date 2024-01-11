<?php

namespace App\Http\Controllers;

use App\Models\AvaliarReceitas;
use App\Models\Notification;
use Illuminate\Http\Request;

class AvaliarReceitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( $number,$receitaId,$avaliador,$receitaUserId)
    {

        $newNotification = new Notification(['type'=>'shared','notifiedBy_id'=> $avaliador,'receitas_id'=>$receitaId,'receitaUserId'=>$receitaUserId]);
        $newNotification->save();
        $newReceita = new AvaliarReceitas([
            'score'=>$number,
            'receita_id'=>$receitaId,
            'avaliador'=>$avaliador
        ]);
        $newReceita->save();

        return true;

    }

    public function show(string $id)
    {
        return AvaliarReceitas::find($id);
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
