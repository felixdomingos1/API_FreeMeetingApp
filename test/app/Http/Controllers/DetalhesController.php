<?php

namespace App\Http\Controllers;

use App\Models\Receitas;
use Illuminate\Http\Request;

class DetalhesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($receitaId)
    {
        $receita = Receitas::find($receitaId);
     
        return response()->json($receita);
        
        // return view('layouts.detalhes')->with('receita', $receita);
    }
    
    public function showDetailPage($receitaId)
    {
        return view('layouts.detalhes')->with('receitaId', $receitaId);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
