<?php

use App\Http\Controllers\api\NotificationController;
use App\Http\Controllers\Api\ReceitasController;
use App\Http\Controllers\api\ShareController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AvaliarReceitasController;
use App\Http\Controllers\DetalhesController;
use Illuminate\Support\Facades\Route;

Route::get('detalhes/{receitaId}', [DetalhesController::class, 'index'])->name('detalhes');
Route::get('sharing/{receitaId}/{userId}/{receitaUserId}', [ReceitasController::class, 'sharing'])->name('sharing');
Route::get('myNoyifies/{userId}', [NotificationController::class, 'show'])->name('myNotifies');
Route::get('user/{userId}', [RegisterController::class, 'showUser']);
Route::get('avaliar/{receitaId}/{avaliador}/{number}/{receitaUserId}', [AvaliarReceitasController::class, 'store']);


